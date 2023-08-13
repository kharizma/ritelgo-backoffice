<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserBusiness;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\BusinessOutlet;

class BusinessInfoService
{
    public static function generateId()
    {
        return 'BNS'.strtotime(Carbon::now()).mt_rand(10,99);
    }

    public function store(array $items): UserBusiness
    {
        $id = $this->generateId();

        $items['id']            = $id;
        $items['user_id']       = Auth::user()->id;
        $items['province_name'] = Province::getName($items['province_id'])->name;
        $items['created_by']    = Auth::user()->id;
        $items['updated_by']    = Auth::user()->id;
        
        $userBusiness = UserBusiness::create($items);

        User::where('id',Auth::user()->id)->update([
            'is_complete_registration' => true
        ]);

        BusinessOutlet::create([
            'id'            => Str::uuid(),
            'business_id'   => $id,
            'name'          => 'Outlet 1',
            'created_by'    => Auth::user()->id,
            'updated_by'    => Auth::user()->id,
        ]);

        return $userBusiness;
    }

    public function update(string $id, array $items): int
    {
        $items['province_name'] = ucwords(strtolower(Province::getName($items['province_id'])->name));
        $items['regency_name']  = ucwords(strtolower(Regency::getName($items['regency_id'])->name));
        $items['district_name'] = ucwords(strtolower(District::getName($items['district_id'])->name));
        $items['village_name']  = ucwords(strtolower(Village::getName($items['village_id'])->name));
        
        \Log::debug($items);
        
        $userBusiness = UserBusiness::where('id',$id)->update($items);

        return $userBusiness;
    }
}