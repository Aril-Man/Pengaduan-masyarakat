<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('masyarakat.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD
            'tanggal' => 'required|date format:Y-m-d',
            'nik' => 'required|integer',
=======
            'tanggal' => 'required',
            'nik' => 'required|max:16',
>>>>>>> 036b98ff35a36ffd58b5de97d84534e2fd1b654e
            'isi_laporan' => 'required',
            'foto' => 'required|file |image|mimes:jpeg,png,jpg',
            'status' => 'required|string',
        ]);

        $path = public_path('/images/pengaduan/');
        if ($request->hasFile('foto')) {
            $uploadImage = $request->foto;
            $imageName = $uploadImage->getClientOriginalName();
            $uploadImage->move($path, $imageName);
        }

        $payload = [
            'tanggal' => $request->tanggal,
            'nik' => $request->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $imageName,
            'status' => $request->status,
        ];

        unset($payload['_token']);
        unset($payload['_method']);

        Pengaduan::create($payload);

        // dd($data);

        return redirect()->back();
    }
<<<<<<< HEAD
=======

    public function index_pengaduan()
    {
        $pengaduans = Pengaduan::all();

        return view('masyarakat.pengaduan', compact('pengaduans'));
    }
>>>>>>> 036b98ff35a36ffd58b5de97d84534e2fd1b654e
}
