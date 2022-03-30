<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index(Masyarakat $masyarakat)
    {
        $user = User::where('role', 'petugas')->get();
        return view('petugas.index', compact('user'));
    }

    public function pengaduan(Pengaduan $pengaduan)
    {
        $pengaduans = $pengaduan->all();
        return view('petugas.pengaduan', compact('pengaduans'));
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('petugas.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->update($request->all());
        return redirect()->route('petugas.pengaduan')->with('success', 'Status Sudah Selesai');
    }
}