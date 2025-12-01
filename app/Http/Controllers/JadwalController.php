<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    // Mahasiswa: list jadwal kelas dia
    public function indexMahasiswa()
    {
        $user = Auth::user();
        $kelasIds = $user->kelas()->pluck('kelas.id')->toArray();
        $jadwals = Jadwal::with(['kelas','mataKuliah','dosen'])
                    ->whereIn('kelas_id', $kelasIds)
                    ->orderBy('hari')->get();

        return view('jadwal.index-mahasiswa', compact('jadwals'));
    }

    // Dosen: jadwal yang dia ampu
    public function indexDosen()
    {
        $user = Auth::user();
        $jadwals = Jadwal::with(['kelas','mataKuliah'])
                    ->where('dosen_id', $user->id)
                    ->orderBy('hari')->get();

        return view('jadwal.index-dosen', compact('jadwals'));
    }

    // Admin: lihat semua jadwal (read-only)
    public function indexAdmin()
    {
        $jadwals = Jadwal::with(['kelas','mataKuliah','dosen'])->orderBy('kelas_id')->get();
        return view('jadwal.index-admin', compact('jadwals'));
    }

    // Form create (only dosen allowed)
    public function create()
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat jadwal');
        $kelas = Kelas::all();
        $matkul = MataKuliah::all();
        return view('jadwal.create', compact('kelas','matkul'));
    }

    // Store (only dosen allowed)
    public function store(Request $r)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat jadwal');

        $r->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'hari' => 'required|string|max:15',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'nullable|string|max:50',
        ]);

        $data = $r->only(['kelas_id','mata_kuliah_id','hari','jam_mulai','jam_selesai','ruang']);
        $data['dosen_id'] = Auth::id();

        Jadwal::create($data);

        return redirect()->route('jadwal.dosen.index')->with('success','Jadwal berhasil dibuat');
    }

    // Show single jadwal
    public function show($id)
    {
        $jadwal = Jadwal::with(['kelas','mataKuliah','dosen'])->findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    // Destroy (admin & dosen allowed to delete)
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // allow delete if admin or owner dosen
        $user = Auth::user();
        if ($user->role !== 'admin' && $user->id !== $jadwal->dosen_id) {
            abort(403, 'Tidak punya hak untuk menghapus jadwal ini.');
        }

        $jadwal->delete();
        return back()->with('success','Jadwal dihapus');
    }

    // Optional: edit/update only for dosen (admin forbidden)
    public function edit($id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah jadwal');
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $matkul = MataKuliah::all();
        return view('jadwal.edit', compact('jadwal','kelas','matkul'));
    }

    public function update(Request $r, $id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah jadwal');

        $jadwal = Jadwal::findOrFail($id);
        if (Auth::id() !== $jadwal->dosen_id && Auth::user()->role !== 'admin') {
            abort(403,'Tidak punya hak untuk mengubah jadwal.');
        }

        $r->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'hari' => 'required|string|max:15',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'nullable|string|max:50',
        ]);

        $jadwal->update($r->only(['kelas_id','mata_kuliah_id','hari','jam_mulai','jam_selesai','ruang']));
        return redirect()->route('jadwal.dosen.index')->with('success','Jadwal diperbarui');
    }
}
