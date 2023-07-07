<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('golongan.index', [
            "title" => "Golongan",
            "dataGolongan" => Golongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('golongan.create', [
            "title" => "Golongan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gol_kode' => 'required|unique:tb_golongan',
            'gol_nama' => ''
        ]);
        
        Golongan::create($data);
        
        return redirect('/golongan')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('golongan.edit', [
            "title" => "Golongan",
            "dataGolongan" => Golongan::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'gol_nama' => ''
        ];
        
        $dataGolongan = Golongan::where('id', $id)->first();
        
        if ($request->gol_kode != $dataGolongan->gol_kode) {
            $data['gol_kode'] = 'required|unique:tb_golongan';
        }
        
        $validatedData = $request->validate($data);
        Golongan::where('id', $id)->first()->update($validatedData);
                
        return redirect('/golongan')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Golongan::where('id', $id)->delete();
        
        return redirect('/golongan')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
