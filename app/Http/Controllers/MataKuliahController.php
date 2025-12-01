<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Auth;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = MataKuliah::all();
        return view('matakuliah.index', compact('data'));
    }

    public function create()
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat mata kuliah');
        return view('matakuliah.create');
    }

    public function store(Request $r)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh membuat mata kuliah');

        $r->validate(['nama'=>'required','kode'=>'required']);
        MataKuliah::create($r->only('nama','kode','sks','deskripsi'));
        return redirect()->route('matakuliah.index')->with('success','Mata kuliah dibuat');
    }

    public function edit($id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah mata kuliah');
        $m = MataKuliah::findOrFail($id);
        return view('matakuliah.edit', compact('m'));
    }

    public function update(Request $r, $id)
    {
        abort_if(Auth::user()->role === 'admin', 403, 'Admin tidak boleh mengubah mata kuliah');
        $m = MataKuliah::findOrFail($id);
        $r->validate(['nama'=>'required','kode'=>'required']);
        $m->update($r->only('nama','kode','sks','deskripsi'));
        return redirect()->route('matakuliah.index')->with('success','Mata kuliah diupdate');
    }

    // destroy: admin allowed
    public function destroy($id)
    {
        abort_if(Auth::user()->role !== 'admin', 403, 'Hanya admin yang boleh menghapus mata kuliah');
        MataKuliah::findOrFail($id)->delete();
        return back()->with('success','Mata kuliah dihapus');
    }
}
