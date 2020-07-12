<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{

    public function charge(Request $request)
    {

        if ($request->input('stripeToken')) {

            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey('sk_test_pkruf96nzHyj6jxaj8uTSIof');

            $token = $request->input('stripeToken');

            $response = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => 'gbp',
                'token' => $token,
            ])->send();

            if($response->isSuccessful()) {

                $arr_payment_data = $response->getData();

                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = 'gbp';
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                }

                return "Payment is successful. Your payment id is: ". $arr_payment_data['id'];

            } else {
                return $response->getMessage();
            }

        }

    }


}
