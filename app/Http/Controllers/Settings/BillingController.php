<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Billing\StoreRequest;
use App\Http\Requests\Billing\PaymentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\PackageSubscription;
use App\Models\Subscription;

class BillingController extends Controller
{
    public function index(): View
    {
        $packages = PackageSubscription::get();
        $invoices = Subscription::get();

        return view('settings.billing.index',compact('packages','invoices'));
    }

    public function upgrade(): View
    {
        $packages = PackageSubscription::with('details')->where('is_show',true)
            ->where('is_active',true)
            ->orderBy('price','asc')->get();

        return view('settings.billing.upgrade',compact('packages'));
    }

    public function checkout($id): View
    {
        $invoice = Subscription::findOrFail($id);

        return view('settings.billing.checkout',compact('invoice'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $package = PackageSubscription::findOrFail($request->package_subscription_id);

        $num = Subscription::whereDate('created_at',date('Y-m-d'))->count();
        $len = strlen(++$num);

        for($i=$len; $i<5; ++$i) {
            $num = '0'.$num;
        }

        $id = 'RGI'.date('Ymd').mt_rand(11,99).$num;
        $request->price_type == 'monthly' ? $price = $package->price : $price = $package->price_annual;

        $request->merge([
            'id'                            => $id,
            'user_id'                       => Auth::user()->id,
            'user_name'                     => Auth::user()->name,
            'user_email'                    => Auth::user()->email,
            'user_mobile_phone'             => Auth::user()->mobile_phone,
            'package_subscription_name'     => $package->name,
            'package_subscription_price'    => $price,
            'price_type'                    => $request->price_type,
            'total_amount'                  => $price,
            'status'                        => Subscription::PAYMENT_STATUS_CHECKOUT
        ]);

        $request->request->remove('_token');

        Subscription::create($request->all());

        return redirect()->route('settings.billing.checkout',$id);
    }

    public function payment(PaymentRequest $request): RedirectResponse
    {
        Subscription::findOrFail($request->invoice_id);

        $secret_key = 'Basic ' . config('xendit.key_auth');

        $request_callback = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/callback_urls/invoice', [
            'url' => config('xendit.callback_url')
        ]);

        \Log::debug($request_callback);

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id'           => $request->invoice_id,
            'payer_email'           => Auth::user()->email,
            'customer'              => [
                'given_name'    => Auth::user()->name,
                'email'         => Auth::user()->email,
                'mobile_number' => Auth::user()->mobile_phone
            ],
            'description'           => 'Pembayaran ' . $request->package_subscription_name . ' ' . $request->price_type,
            'amount'                => (int) $request->total_amount,
            'success_redirect_url'  => config('xendit.redirect_url') . '/' . $request->invoice_id,
            'failure_redirect_url'  => config('xendit.redirect_url') . '/' . $request->invoice_id,
        ]);

        \Log::debug($data_request);

        $response = $data_request->object();

        Subscription::where('id',$request->invoice_id)->update([
            'status' => strtolower($response->status),
            'xendit_invoice_url' => $response->invoice_url
        ]);

        return redirect()->to($response->invoice_url);
    }
}
