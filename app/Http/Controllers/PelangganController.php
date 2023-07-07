<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelanggan.index', [
            "title" => "Pelanggan",
            "dataPelanggan" => Pelanggan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create', [
            "title" => "Pelanggan",
            "dataGolongan" => Golongan::all(),
            "dataUser" => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pel_id_gol' => '',
            'pel_id_user' => '',
            'pel_no' => 'required|unique:tb_pelanggan',
            'pel_nama' => '',
            'pel_alamat' => '',
            'pel_hp' => '',
            'pel_ktp' => '',
            'pel_seri' => '',
            'pel_meteran' => ''
        ]);
        
        Pelanggan::create($data);
        
        return redirect('/pelanggan')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('pelanggan.edit', [
            "title" => "Pelanggan",
            "dataGolongan" => Golongan::all(),
            "dataUser" => User::all(),
            "dataPelanggan" => Pelanggan::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'pel_id_gol' => '',
            'pel_id_user' => '',
            'pel_aktif' => '',
            'pel_nama' => '',
            'pel_alamat' => '',
            'pel_hp' => '',
            'pel_ktp' => '',
            'pel_seri' => '',
            'pel_meteran' => ''
        ];
        
        $dataPelanggan = Pelanggan::where('id', $id)->first();
        
        if ($request->pel_no != $dataPelanggan->pel_no) {
            $data['pel_no'] = 'required|unique:tb_pelanggan';
        }
        
        $validatedData = $request->validate($data);
        Pelanggan::where('id', $id)->first()->update($validatedData);
                
        return redirect('/pelanggan')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelanggan::where('id', $id)->delete();
        
        return redirect('/pelanggan')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
