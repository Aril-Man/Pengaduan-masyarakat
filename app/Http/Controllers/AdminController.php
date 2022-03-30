<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Masyarakat $masyarakat)
    {
        $user = User::where('role', 'petugas')->get();
        return view('admin.index', compact('user'));
    }

    public function create_petugas()
    {
        return view('admin.create_petugas');
    }

    public function store_petugas(Request $request)
    {
        $username = str_replace(' ', '', strtolower($request->nama) . rand(1, 100));
        $password = Hash::make($username);

        User::create([
            'nama' => $request->nama,
            'username' => $username,
            'password' => $password,
            'telp' => $request->telp,
            'role' => 'petugas',
        ]);

        // dd($data);
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy_petugas($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function pengaduan(Pengaduan $pengaduan)
    {
        $pengaduans = $pengaduan->all();
        return view('admin.pengaduan', compact('pengaduans'));
    }

    public function destroy_pengaduan($id)
    {
        $data = Pengaduan::find($id);
        $data->delete();

        return redirect()->route('admin.pengaduan')->with('success', 'Data Berhasil Dihapus!');
    }

    public function cetak_pengaduan()
    {
        $pengaduans = Pengaduan::all();
        return view('admin.cetak_pengaduan', compact('pengaduans'));
    }
}