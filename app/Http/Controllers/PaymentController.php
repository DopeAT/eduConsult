<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\User;
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
                $userIsPaying = User::where('email', $request->input('email'))->first();

                if(!$isPaymentExist && $userIsPaying)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = 'gbp';
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();

                    Order::create([
                        'payment_id' => $payment->payment_id,
                        'user_id'    => $userIsPaying->id,
                        'service_id' => $request->input('service_id'),
                        'product_id' => $request->input('product_id'),
                        'extra_services' => implode(',', $request->input('extra_services')),
                        'delivery_id' => $request->input('delivery_id'),
                        'type_id' => $request->input('type_id'),
                        'level_id' => $request->input('level_id'),
                        'is_new' => 1,
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'status'  => 200,
                    'message' => "Payment is successful. Your payment id is: ". $arr_payment_data['id']
                ]);

            } else {
                return $response->getMessage();
            }

        }

    }


}
