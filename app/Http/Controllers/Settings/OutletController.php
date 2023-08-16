<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Outlet\StoreRequest;
use App\Http\Requests\Outlet\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\UserBusiness;
use App\Models\BusinessOutlet;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class OutletController extends Controller
{
    public function index(): View
    {
        $i          = 1;
        $outlets    = BusinessOutlet::get();
        $provinces  = Province::get();
        $business   = UserBusiness::where('user_id',Auth::user()->id)->select('id')->first();

        return view('settings.outlets.index',compact('outlets','provinces','business','i'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $request->merge([
            'id'            => Str::uuid(),
            'province_name' => ucwords(strtolower(Province::getName($request->province_id)->name)),
            'regency_name'  => ucwords(strtolower(Regency::getName($request->regency_id)->name)),
            'district_name' => ucwords(strtolower(District::getName($request->district_id)->name)),
            'village_name'  => ucwords(strtolower(Village::getName($request->village_id)->name)),
            'created_by'    => Auth::user()->id,
            'updated_by'    => Auth::user()->id,
        ]);

        $request->request->remove('_token');

        BusinessOutlet::create($request->all());

        return redirect()->route('settings.outlets.index');
    }

    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        BusinessOutlet::findOrFail($id);

        $request->merge([
            'province_name' => ucwords(strtolower(Province::getName($request->province_id)->name)),
            'regency_name'  => ucwords(strtolower(Regency::getName($request->regency_id)->name)),
            'district_name' => ucwords(strtolower(District::getName($request->district_id)->name)),
            'village_name'  => ucwords(strtolower(Village::getName($request->village_id)->name)),
        ]);

        $request->request->remove('_method');
        $request->request->remove('_token');

        BusinessOutlet::where('id',$id)->update($request->all());

        return redirect()->route('settings.outlets.index');
    }
}
