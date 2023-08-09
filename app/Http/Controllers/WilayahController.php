<?php

namespace App\Http\Controllers;

use App\Models\indonesia_provinces;
use App\Models\indonesia_cities;
use App\Models\indonesia_districts;
use App\Models\indonesia_villages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function wilayah()
    {
        $data['name'] = indonesia_provinces::get(["name", "code"]);
        return view('wilayah/wilayah', $data);
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
}
