<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    // admin/dosen/mahasiswa bisa lihat
    public function index()
    {
        $data = Kelas::all();
        return view('kelas.index', compact('data'));
    }

    // admin not allowed to create/update (enforce)
    public function create()
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat kelas');
        return view('kelas.create');
    }

    public function store(Request $r)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat kelas');

        $r->validate(['nama'=>'required','kode'=>'required']);
        Kelas::create($r->only('nama','kode','kapasitas','deskripsi'));
        return redirect()->route('kelas.index')->with('success','Kelas dibuat');
    }

    public function edit($id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah kelas');
        $k = Kelas::findOrFail($id);
        return view('kelas.edit', compact('k'));
    }

    public function update(Request $r, $id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah kelas');
        $k = Kelas::findOrFail($id);
        $r->validate(['nama'=>'required','kode'=>'required']);
        $k->update($r->only('nama','kode','kapasitas','deskripsi'));
        return redirect()->route('kelas.index')->with('success','Kelas diupdate');
    }

    // destroy allowed for admin (as requested) or whoever you permit
    public function destroy($id)
    {
        // allow delete by admin only
        abort_if(Auth::user()->role !== 'admin', 403, 'Hanya admin yang boleh menghapus kelas');
        Kelas::findOrFail($id)->delete();
        return back()->with('success','Kelas dihapus');
    }
}
