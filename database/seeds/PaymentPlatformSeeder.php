<?php

use App\PaymentPlatform;
use Illuminate\Database\Seeder;

class PaymentPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlatform::create([
            'name'=>'PayPal',
            'image'=>'image/payment-platforms/paypal.png',
        ]);
        PaymentPlatform::create([
            'name' => 'Stripe',
            'image' => 'image/payment-platforms/stripe.png',
        ]);

        PaymentPlatform::create([
            'name' => 'MercadoPago',
            'image' => 'image/payment-platforms/mercadopago.png',
        ]);

        PaymentPlatform::create([
            'name' => 'PayU',
            'image' => 'image/payment-platforms/payu.png',
        ]);
    }
}
