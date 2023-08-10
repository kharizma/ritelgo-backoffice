<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class HelperController extends Controller
{
    public function getRegencies($province_id)
    {
        $regencies = Regency::where('province_id',$province_id)
            ->select('id','name')
            ->orderBy('name','asc')
            ->get();

        foreach($regencies as $regency){
            $arr_regencies[] = [
                'id' => $regency->id,
                'name' =>  ucwords(strtolower($regency->name))
            ];
        }

        return response()->json($arr_regencies);
    }

    public function getDistricts($regency_id)
    {
        $districts = District::where('regency_id',$regency_id)
            ->select('id','name')
            ->orderBy('name','asc')
            ->get();

        foreach($districts as $district){
            $arr_districts[] = [
                'id' => $district->id,
                'name' =>  ucwords(strtolower($district->name))
            ];
        }

        return response()->json($arr_districts);
    }

    public function getVillages($district_id)
    {
        $villages = Village::where('district_id',$district_id)
            ->select('id','name')
            ->orderBy('name','asc')
            ->get();

        foreach($villages as $village){
            $arr_villages[] = [
                'id' => $village->id,
                'name' =>  ucwords(strtolower($village->name))
            ];
        }

        return response()->json($arr_villages);
    }

    public function getZipCode($village_id)
    {
        $village = Village::where('id',$village_id)
            ->select('zip_code')
            ->first();

        return response()->json($village);
    }
}
