<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::paginate(5); // Mengambil 5 isi tabel
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        return view('mahasiswas.index', compact('mahasiswas'));
    }
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Email' => 'required',
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => '',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        $mahasiswas = new Mahasiswa;
        $mahasiswas ->Email = $request->get('Email');
        $mahasiswas ->Nim = $request->get('Nim');
        $mahasiswas ->Nama = $request->get('Nama');
        $mahasiswas ->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $mahasiswas ->Jurusan = $request->get('Jurusan');
        $mahasiswas ->No_Handphone = $request->get('No_Handphone');

        //fungsi eloquent untuk menambah data
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Email' => 'required',
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => '',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',

        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswas = Mahasiswa::find($Nim);
        $mahasiswas ->Email = $request->get('Email');
        $mahasiswas ->Nim = $request->get('Nim');
        $mahasiswas ->Nama = $request->get('Nama');
        $mahasiswas ->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $mahasiswas ->Jurusan = $request->get('Jurusan');
        $mahasiswas ->No_Handphone = $request->get('No_Handphone');

        //fungsi eloquent untuk menambah data
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswas = Mahasiswa::where('Nama', 'like', '%' . $keyword . '%')->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
};