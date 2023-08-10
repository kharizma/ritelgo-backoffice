<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserBusiness;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    public function index(): View
    {
        $personal   = User::findOrFail(Auth::user()->id);
        $business   = UserBusiness::where('user_id',Auth::user()->id)->first();
        $provinces  = Province::get();

        return view('settings.accounts.index',compact(['personal','business','provinces']));
    }

    public function edit(): View
    {
        $personal = User::findOrFail(Auth::user()->id);

        return view('settings.accounts.edit-account',compact(['personal']));
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        User::findOrFail(Auth::user()->id);

        User::where('id',Auth::user()->id)->update($request->validated());

        return redirect()->route('settings.accounts.index');
    }
}
