<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Subscription;

class InvoiceController extends Controller
{
    public function __invoke($id): View
    {
        $subscription = Subscription::findOrFail($id);

        return view('invoice',compact('subscription'));
    }
}