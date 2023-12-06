<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use App\Models\PricingPackage;
use App\Models\PaymentHistory;
use App\Models\User;
use Carbon\Carbon;
use DGvai\SSLCommerz\SSLCommerz;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        $gatewayInfo = PaymentGateway::where('id', 1)->first();
        config([
            'sslcommerz.store.id' => $gatewayInfo ? $gatewayInfo->api_key : '',
            'sslcommerz.store.password' => $gatewayInfo ? $gatewayInfo->secret_key : '',
            'sslcommerz.sandbox' => ($gatewayInfo && $gatewayInfo->live == 1) ? false : true,
        ]);
    }

    public function orderPayment($id)
    {
        $pricingPackageInfo = PricingPackage::where('id', $id)->first();
        if($pricingPackageInfo){
            $userInfo = User::where('id', Auth::user()->id)->first();
            $userEmailContact = ($userInfo->email != '' && $userInfo->email != NULL) ? $userInfo->email : $userInfo->contact;

            $sslc = new SSLCommerz();
            $sslc->amount($pricingPackageInfo->price)
                ->trxid(str::random(5).time())
                ->product('Products of ShadiKorun')
                ->customer($userInfo->name, $userEmailContact);
            return $sslc->make_payment();

        } else {
            Toastr::error('Something Went Wrong', 'Failed');
            return redirect('user/dashboard');
        }
    }

    public function success(Request $request)
    {
        $validate = SSLCommerz::validate_payment($request);
        if($validate)
        {
            // dd($request->all());
            $packageInfo = PricingPackage::where('price', (int) $request->amount)->first();

            $userInfo = User::where('id', Auth::user()->id)->first();
            $userInfo->connections = $userInfo->connections + $packageInfo->connections;
            $userInfo->last_purchase_date = Carbon::now();
            $userInfo->save();

            PaymentHistory::insert([
                'user_id' => $userInfo->id,
                'package_id' => $packageInfo->id,
                'purchased_connections' => $packageInfo->connections,
                'payment_through' => "SSL COMMERZ",
                'tran_id' => $request->tran_id,
                'bank_tran_id' => $request->bank_tran_id,
                'val_id' => $request->val_id,
                'amount' => $request->amount,
                'card_type' => $request->card_type,
                'store_amount' => $request->store_amount,
                'card_no' => $request->card_no,
                'status' => $request->status,
                'tran_date' => $request->tran_date,
                'currency' => $request->currency,
                'card_issuer' => $request->card_issuer,
                'card_brand' => $request->card_brand,
                'card_sub_brand' => $request->card_sub_brand,
                'card_issuer_country' => $request->card_issuer_country,
                'store_id' => $request->store_id,
                'created_at' => Carbon::now()
            ]);

            Toastr::success('Successfully Purchased Connections', 'Congratulation!');
            return redirect('user/dashboard');

        }
    }

    public function failure(Request $request)
    {
        //  do the database works
        //  also same goes for cancel()
        //  for IPN() you can leave it untouched or can follow
        //  official documentation about IPN from SSLCommerz Panel

        Toastr::error('Something Went Wrong', 'Failed');
        return redirect('user/dashboard');

    }

    public function cancel(Request $request)
    {

        //  do the database works
        //  for IPN() you can leave it untouched or can follow
        //  official documentation about IPN from SSLCommerz Panel

        Toastr::error('Payment is Cancelled', 'Cancelled');
        return redirect('user/dashboard');

    }

    public function refund($bankID)
    {
        /**
         * SSLCommerz::refund($bank_trans_id, $amount [,$reason])
         */

        $refund = SSLCommerz::refund($bankID, $refund_amount=100);

        if($refund->status)
        {
            /**
             * States:
             * success : Refund request is initiated successfully
             * failed : Refund request is failed to initiate
             * processing : The refund has been initiated already
            */

            $state  = $refund->refund_state;

            /**
             * RefID will be used for post-refund status checking
            */

            $refID  = $refund->ref_id;

            /**
             *  To get all the outputs
            */

            dd($refund->output);
        }
        else
        {
            return $refund->message;
        }
    }

    public function check_refund_status($refID)
    {
        $refund = SSLCommerz::query_refund($refID);

        if($refund->status)
        {
            /**
             * States:
             * refunded : Refund request has been proceeded successfully
             * processing : Refund request is under processing
             * cancelled : Refund request has been proceeded successfully
            */

            $state  = $refund->refund_state;

            /**
             * RefID will be used for post-refund status checking
            */

            $refID  = $refund->ref_id;

            /**
             *  To get all the outputs
            */

            dd($refund->output);
        }
        else
        {
            return $refund->message;
        }
    }

    public function get_transaction_status($trxID)
    {
        $query = SSLCommerz::query_transaction($trxID);

        if($query->status)
        {
            dd($query->output);
        }
        else
        {
            $query->message;
        }
    }
}
