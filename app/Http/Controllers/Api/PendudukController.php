<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduks = penduduk::paginate(10);
        return response()->json([
            'data'=>$penduduks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penduduk = penduduk::create([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan
        ]);

        return response()->json([
            'data' => $penduduk
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(penduduk $penduduk)
    {
        return response()->json([
                'data'=>$penduduk
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penduduk $penduduk)
    {
        $penduduk->nik = $request->nik;
        $penduduk->no_kk = $request->kk;
        $penduduk->nama = $request->nama;
        $penduduk->jk = $request->jk;
        $penduduk->alamat = $request->alamat;
        $penduduk->no_hp = $request->hp;
        $penduduk->agama = $request->agama;
        $penduduk->pekerjaan = $request->pekerjaan;

        $penduduk->save();

        return response()->json([
            'data'=>$penduduk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penduduk $penduduk)
    {
        $penduduk->delete();
        return response()->json([
            'message'=> 'Penduduk Deleted'
        ], 204);
    }
}
