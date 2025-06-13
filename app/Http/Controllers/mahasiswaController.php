<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responseM = Http::get('http://localhost:8080/mahasiswa');
        $responseI = Http::get('http://localhost:8080/user');
        $responseK = Http::get('http://localhost:8080/kelas');
        $user = $responseI->json();
        $kelas = $responseK->json();
        $mahasiswa = $responseM->json();
        return view('mahasiswa.index', compact('mahasiswa', 'user','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required|string|max:100',
            'email' => 'required',
            'id_user' => 'required',
            'kode_kelas' => 'required'
        ]);

        $response =Http::post('http://localhost:8080/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'id_user' => $request->id_user,
            'kode_kelas' => $request->kode_kelas
        ]);

        if($response->successful()){
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
        }else{
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa gagal ditambahkan');
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request -> validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required|string|max:100',
            'email' => 'required',
            'id_user' => 'required',
            'kode_kelas' => 'required'
        ]);

        $response =Http::put('http://localhost:8080/mahasiswa/' . $id, [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'id_user' => $request->id_user,
            'kode_kelas' => $request->kode_kelas
        ]);

        if($response->successful()){
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
        }else{
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa gagal ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/mahasiswa/' . $id);
        if($response->successful()){
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
        }else{
            return redirect()->route('mahasiswa.index')->with('error', 'Data mahasiswa gagal dihapus');
        }
    }
}
