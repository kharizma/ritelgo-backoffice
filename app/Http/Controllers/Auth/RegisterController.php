<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PackageSubscription;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $num = User::where('role','owner')->count();
        $len = strlen(++$num);

        for($i=$len; $i<7; ++$i) {
            $num = '0'.$num;
        }

        $words      = explode(" ",$request->name);
        $acronym    = "";

        if($words >= 2){
            $acronym .= mb_substr($words[0], 0, 1).mb_substr($words[1], 0, 1);
        }else{
            $acronym .= $words[0].$words[0];
        }

        $package = PackageSubscription::where('id',1)
            ->select('name')
            ->first();

        $request->merge([
            'id'                        => 'RGOOW'.$num,
            'role'                      => 'owner',
            'initial_name'              => $acronym,
            'mobile_phone'              => '62'.$request->mobile_phone,
            'is_agreement'              => $request->is_agreement ? true : false,
            'package_subscription_id'   => 1,
            'package_subscription_name' => $package->name,
            'valid_until'               => Carbon::now()->addDays(14)->format('Y-m-d'),
            'is_subscribe'              => true,
            'is_complete_registration'  => false
        ]);

        $user = User::create($request->all());

        event(new Registered($user));
     
        return redirect()->route('login');
    }
}
