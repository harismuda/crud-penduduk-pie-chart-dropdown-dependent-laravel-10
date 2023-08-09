<?php

namespace App\Http\Controllers;

use App\Models\Kartukeluarga;
use App\Models\indonesia_provinces;
use App\Models\indonesia_cities;
use App\Models\indonesia_districts;
use App\Models\indonesia_villages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KartukeluargaController extends Controller
{
    public function wilayah()
    {
        $data['name'] = indonesia_provinces::get(["name", "code"]);
        return view('keluarga/kk', $data);
    }
    public function getKabupaten($idProvinsi)
    {
        $cities = indonesia_cities::where('province_code', $idProvinsi)->get();
        return response()->json($cities);
    }
    public function getKecamatan($idKecamatan)
    {
        $districts = indonesia_districts::where('city_code', $idKecamatan)->get();
        return response()->json($districts);
    }
    public function getDesa($idDesa)
    {
        $villages = indonesia_villages::where('district_code', $idDesa)->get();
        return response()->json($villages);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kk = DB::table('kk')
            ->join('penduduk', 'kk.no_kk', '=', 'penduduk.no_kk')
            ->join('indonesia_villages', 'kk.kelurahan', '=', 'indonesia_villages.code')
            ->get();
        return view('keluarga/kk', ['kk' => $kk]);
    }

    public function detail($id)
    {
        $kk = DB::table('kk')
            ->select('*')
            ->join('penduduk', 'kk.no_kk', '=', 'penduduk.no_kk')
            ->join('indonesia_villages', 'kk.kelurahan', '=', 'indonesia_villages.code')
            ->where(['penduduk.no_kk' => $id])
            ->get();
        return view('keluarga/detail', ['kk' => $kk]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['name'] = indonesia_provinces::get(["name", "code"]);
        return view('keluarga/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('foto')->store('photos', 'public');

        DB::table('kk')->insert([
            'no_kk' => $request->kk,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'foto' => $imagePath
        ]);
         return redirect('/kk')->with('success', 'Data berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kartukeluarga $kartukeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kk = DB::table('kk')->where('no_kk', $id)->get();
        $data['name'] = indonesia_provinces::get(["name", "code"]);
        return view('keluarga/edit', $data, ['kk' => $kk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Kartukeluarga::where('no_kk', $request->input('kk'))->first();

        if($request->hasFile('foto')){
            Storage::disk('public')->delete($data->foto);
            $imagePath = $request->file('foto')->store('photos', 'public');
            $data->foto = $imagePath;
        }
        
        $data->provinsi = $request->input('provinsi');
        $data->kabupaten = $request->input('kabupaten');
        $data->kecamatan = $request->input('kecamatan');
        $data->kelurahan = $request->input('kelurahan');
        
        $data->save();
        return redirect('/kk')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = DB::table('kk')->where('no_kk', $id)->first();
        Storage::disk('public')->delete($data->foto);

        DB::table('kk')->where('no_kk', $id)->delete();
        return redirect('/kk')->with('success', 'Data berhasil di hapus');
    }
}
