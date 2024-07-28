<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pay\PaymentRequest;
use App\Resolvers\PaymentPlatformResolver;
use App\Setting;
use App\ShoppingCart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware('client_auth');

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }


    public function pay(PaymentRequest $request){
       
        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->paymentmethod);
        session()->put('paymentPlatformId', $request->paymentmethod);
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $total_price = $shopping_cart->total_price();
        $iso = Setting::find(1)->pluck('iso');
        $request->merge([
            'value' => $total_price,
            'currency' => $iso[0],
        ]);
        return $paymentPlatform->handlePayment($request);
    }

    public function approval(){
        if (session()->has('paymentPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('web.checkout')
            ->withErrors('We cannot retrieve your payment platform. Try again, plase.');
    }
    public function cancelled(){
        return redirect()
        ->route('web.cart')
        ->withErrors('You cancelled the payment');
    }
}
