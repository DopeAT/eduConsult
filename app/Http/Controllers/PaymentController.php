<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Order;
use App\Payer;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                $payment = null;
                $order = null;
                $payer = null;
                $postcode = $request->input('postCode') ? $request->input('postCode') : '';

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

                    $order = Order::create([
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

                    $order->extra_services()->sync($request->input('extra_services'));

                    $payer = Payer::create([
                        'payer_id'   => $userIsPaying->id,
                        'payment_id' => $payment->payment_id,
                        'email'      => $request->input('email'),
                        'name'       => $request->input('cardName'),
                        'phone'      => $request->input('phone'),
                        'post_code'  => $postcode
                    ]);

                    $order = Order::select('id', 'payment_id', 'user_id', 'service_id', 'product_id', 'delivery_id', 'type_id', 'level_id')
                                  ->where('payment_id', $payment->payment_id)
                                  ->first()
                                  ->load('user', 'service', 'product', 'extra_services');
                }

                Mail::to($request->input('email'))->send(new OrderConfirmation($order, $payment, $payer));

                return response()->json([
                    'info' => [
                        'success' => true,
                        'status'  => 200,
                        'message' => "Your payment has been successful. Your payment id is: ". $arr_payment_data['id'] .". Thank you for your order"
                    ],
                    'data' => [
                        'payment' => $payment,
                        'order' => $order
                    ]
                ]);

            } else {
                return response()->json([
                    'info' => [
                        'success' => false,
                        'status'  => 500,
                        'message' => $response->getMessage()
                    ],
                    'data' => []
                ]);
            }

        }

    }


}
