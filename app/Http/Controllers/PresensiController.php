<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\PresensiDetail;
use App\Models\Jadwal;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    // Dosen buka presensi untuk jadwal tertentu ($jadwalId)
    public function buka(Request $r, $jadwalId)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuka presensi');

        $r->validate(['tanggal'=>'required|date']);

        $jadwal = Jadwal::findOrFail($jadwalId);

        $pres = Presensi::create([
            'jadwal_id' => $jadwal->id,
            'dosen_id' => Auth::id(),
            'tanggal' => $r->tanggal,
            'status' => 'dibuka',
            'waktu_buka' => now(),
            'token' => Str::upper(Str::random(6)),
        ]);

        return back()->with('success','Presensi dibuka (token: '.$pres->token.')');
    }

    // Dosen tutup presensi
    public function tutup($id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh menutup presensi');

        $pres = Presensi::findOrFail($id);
        if (Auth::id() !== $pres->dosen_id && Auth::user()->role !== 'admin') {
            abort(403,'Tidak punya hak untuk menutup presensi ini.');
        }

        $pres->update(['status'=>'ditutup','waktu_tutup'=>now()]);
        return back()->with('success','Presensi ditutup');
    }

    // Mahasiswa lihat halaman presensi
    public function show($id)
    {
        $pres = Presensi::with(['jadwal.mataKuliah','jadwal.kelas','details.mahasiswa'])->findOrFail($id);
        return view('presensi.show', compact('pres'));
    }

    // Mahasiswa melakukan hadir
    public function hadir(Request $r, $id)
    {
        $r->validate(['token'=>'nullable|string']);
        $user = Auth::user();
        $pres = Presensi::findOrFail($id);

        if ($pres->status !== 'dibuka') {
            return back()->with('error','Presensi sudah ditutup.');
        }

        if ($pres->token && $r->filled('token') && $r->token !== $pres->token) {
            return back()->with('error','Token salah.');
        }

        PresensiDetail::updateOrCreate(
            ['presensi_id'=>$pres->id,'mahasiswa_id'=>$user->id],
            ['waktu_presensi'=>now(),'status'=>'hadir']
        );

        return back()->with('success','Kamu berhasil absen.');
    }

    // Dosen lihat daftar hadir
    public function hadirList($id)
    {
        $pres = Presensi::with('details.mahasiswa')->findOrFail($id);
        return view('presensi.hadir-list', compact('pres'));
    }

    // Optional: allow deleting a presensi record (admin or owner dosen)
    public function destroy($id)
    {
        $pres = Presensi::findOrFail($id);
        $user = Auth::user();
        if ($user->role !== 'admin' && $user->id !== $pres->dosen_id) {
            abort(403,'Tidak punya hak menghapus presensi.');
        }
        $pres->delete();
        return back()->with('success','Presensi dihapus');
    }
}
