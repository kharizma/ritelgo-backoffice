<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PackageSubscription;

class BillingController extends Controller
{
    public function index(): View
    {
        $packages = PackageSubscription::get();

        return view('settings.billing.index',compact('packages'));
    }
}
