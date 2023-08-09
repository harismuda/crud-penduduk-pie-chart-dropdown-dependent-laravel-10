<?php

namespace App\Http\Controllers;

use App\Charts\PendudukKelaminChart;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use PHPlot;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chart(PendudukKelaminChart $pendudukKelaminChart)
    {

        return view('home', ['pendudukKelaminChart' => $pendudukKelaminChart->build()]);
    }

    public function index(Request $request)
    {
        $penduduk = DB::table('penduduk')->get();
        return view('penduduk/penduduk', ['penduduk' => $penduduk]);

        // $client = new Client();
        // $response = $client->get('http://localhost:8000/api/penduduk');
        // $data = json_decode($response->getBody(), true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penduduk.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('penduduk')->insert([
            'nik' => $request->nik,
            'no_kk' => $request->kk,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->hp,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan
        ]);
        return redirect('/penduduk')->with('success', 'Data berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penduduk = DB::table('penduduk')->where('nik', $id)->get();
        return view('penduduk/edit', ['penduduk' => $penduduk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        DB::table('penduduk')->where('nik', $request->nik)->update([
            'no_kk' => $request->kk,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->hp,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan
        ]);
        return redirect('/penduduk')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('penduduk')->where('nik', $id)->delete();
        return redirect('/penduduk')->with('success', 'Data berhasil di hapus');
    }
}
