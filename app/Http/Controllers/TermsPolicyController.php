<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use App\Models\RefundPolicy;
use App\Models\TermsCondition;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TermsPolicyController extends Controller
{
    public function termsAndConditions(){
        $data = TermsCondition::where('id', 1)->first();
        return view('backend.policy.terms_condition', compact('data'));
    }

    public function updateTermsAndConditions(Request $request){
        TermsCondition::where('id', 1)->update([
            'details' => $request->details,
            'details_bn' => $request->details_bn,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Terms & Conditions Updated', 'Success');
        return back();
    }

    public function privacyPolicy(){
        $data = PrivacyPolicy::where('id', 1)->first();
        return view('backend.policy.privacy_policy', compact('data'));
    }

    public function updatePrivacyPolicy(Request $request){
        PrivacyPolicy::where('id', 1)->update([
            'details' => $request->details,
            'details_bn' => $request->details_bn,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Privacy Policy Updated', 'Success');
        return back();
    }

    public function refundPolicy(){
        $data = RefundPolicy::where('id', 1)->first();
        return view('backend.policy.refund_policy', compact('data'));
    }

    public function updateRefundPolicy(Request $request){
        RefundPolicy::where('id', 1)->update([
            'details' => $request->details,
            'details_bn' => $request->details_bn,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Refund Policy Updated', 'Success');
        return back();
    }
}
