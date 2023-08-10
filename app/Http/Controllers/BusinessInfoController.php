<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\BusinessInfo\StoreRequest;
use App\Http\Requests\BusinessInfo\UpdateRequest;
use App\Models\BusinessType;
use App\Models\Province;
use App\Models\UserBusiness;
use App\Services\BusinessInfoService;
use Illuminate\Http\RedirectResponse;

class BusinessInfoController extends Controller
{
    private $businessInfoService;

    public function __construct(BusinessInfoService $businessInfoService) 
    {
        $this->businessInfoService = $businessInfoService;
    }

    public function index(): View
    {
        $businesses = BusinessType::orderBy('id','asc')->get();
        $provinces  = Province::orderBy('name','asc')->get();

        return view('business-info',compact('businesses','provinces'));
    }

    public function store(StoreRequest $request)
    {
        $this->businessInfoService->store($request->validated());

        return redirect()->route('home');
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        UserBusiness::findOrFail($request->id);

        $this->businessInfoService->update($request->id,$request->validated());

        return redirect()->route('settings.accounts.index');
    }
}
