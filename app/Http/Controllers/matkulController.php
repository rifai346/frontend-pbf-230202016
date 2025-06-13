<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class matkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $response = Http::get('http://localhost:8080/matkul');
        $matkul = $response->json();
        return view('matkul.index', compact('matkul',));
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
            'kode_matkul' => 'required|string|max:100 ',
            'nama_matkul'=> 'required',
            'sks' => 'required',
           
        ]);

        $response = Http::post('http://localhost:8080/matkul', [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul berhasil ditambahkan');
        } else {
            return redirect()->route('matkul.index')->with('error', 'Gagal menambahkan data matkul');
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
            'kode_matkul' => 'required|string|max:100 ',
            'nama_matkul'=> 'required',
            'sks' => 'required',
           
        ]);

        $response = Http::put('http://localhost:8080/matkul/' . $id, [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul berhasil ditambahkan');
        } else {
            return redirect()->route('matkul.index')->with('error', 'Gagal menambahkan data matkul');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/matkul/' . $id);
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data matkul berhasil dihapus');
        } else {
            return redirect()->route('matkul.index')->with('error', 'Gagal menghapus data matkul');
        }
    }
}
