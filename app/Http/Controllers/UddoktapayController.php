<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Library\UddoktaPay;
use App\Models\Order;
use App\Package;
use App\SubscriptionPackage;
use Exception;
use Illuminate\Http\Request;

class UddoktapayController extends Controller {

    /**
     * Show the payment view
     *
     * @return void
     */
    public function show() {
        return view( 'uddoktapay.payment-form' );
    }

    /**
     * Initializes the payment
     *
     * @param Request $request
     * @return void
     */
    public function pay( Request $request ) {
        // $validatedData = $request->validate( [
        //     'full_name' => ['required', 'string'],
        //     'email'     => ['required', 'email'],
        //     'amount'    => ['required', 'integer'],
        // ] );
        $customer = Customer::find($request->customer_id);
        $package  = Package::find($request->package_id);

        $sub = SubscriptionPackage::where([
            'customer_id' => $customer->id,
            'package_id'  => $package->id,
        ])->first();

        // if ($sub) {
        //     $sub->available = $package->ads;
        //     $sub->buy_times = ++$sub->buy_times;
        //     $sub->validity  = date("Y-m-d", strtotime('+ ' . $package->dead_line . ' days'));
        //     $sub->save();
        // } else {
        //     $sub              = new SubscriptionPackage();
        //     $sub->customer_id = $customer->id;
        //     $sub->package_id  = $package->id;
        //     $sub->available   = $package->ads;
        //     $sub->validity    = date("Y-m-d", strtotime('+ ' . $package->dead_line . ' days'));
        //     $sub->buy_times   = 1;
        //     $sub->save();
        // }

        // $order = Order::create( [
        //     'full_name' => $validatedData['full_name'],
        //     'email'     => $validatedData['email'],
        //     'amount'    => $validatedData['amount'],
        // ] );

        $requestData = [
            'full_name'    => $customer->full_name,
            'email'        => $customer->email,
            'amount'       => $package->price,
            'metadata'     => [
                'order_id'   => $sub->id,
                'metadata_1' => 'foo',
                'metadata_2' => 'bar',
            ],
            'redirect_url' => route( 'uddoktapay.success' ),
            'cancel_url'   => route( 'uddoktapay.cancel' ),
            'webhook_url'  => env( "UDDOKTAPAY_WEBHOOK_DOMAIN" ),
        ];

        try {
            $paymentUrl = UddoktaPay::init_payment( $requestData );
            return redirect ( $paymentUrl );
        } catch (Exception $e) {
            // dd($e->getMessage());
        }
    }

    /**
     * Reponse from sever
     *
     * @param Request $request
     * @return void
     */
    public function webhook( Request $request ) {

        $headerApi = isset( $_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY'] ) ? $_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY'] : null;

        if ( $headerApi == null ) {
            return response( "Api key not found", 403 );
        }

        if ( $headerApi != env( "UDDOKTAPAY_API_KEY" ) ) {
            return response( "Unauthorized Action", 403 );
        }

        $validatedData = $request->validate( [
            'full_name'      => 'required',
            'email'          => 'required',
            'amount'         => 'required',
            'invoice_id'     => 'required',
            'metadata'       => 'required',
            'payment_method' => 'required',
            'sender_number'  => 'required',
            'transaction_id' => 'required',
            'status'         => 'required',
        ] );

        Order::findOrFail( $validatedData['metadata']['order_id'] )->update( [
            'status'         => $validatedData['status'],
            'payment_method' => $validatedData['payment_method'],
            'sender_number'  => $validatedData['sender_number'],
            'transaction_id' => $validatedData['transaction_id'],
            'invoice_id'     => $validatedData['invoice_id'],
        ] );

        return response( 'Database Updated' );
    }

    /**
     * Success URL
     *
     * @return void
     */
    public function success() {
        return 'Payment is successful, Thanks for using Uddokta Pay- Regards <a href="https://codecstasy.com">Code Ecstasy</a>';
    }

    /**
     * Cancel URL
     *
     * @return void
     */
    public function cancel() {
        return 'Payment is cancelled Thanks for using Uddokta Pay- Regards <a href="https://codecstasy.com">Code Ecstasy</a>';
    }

}
