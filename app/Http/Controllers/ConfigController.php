<?php

namespace App\Http\Controllers;
use App\Models\PaymentGateway;
use App\Models\WebsiteLanguage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\BiodataType;
use App\Models\MaritalCondition;
use App\Models\QuestionSet;
use App\Models\SmsGateway;
use Illuminate\Support\Str;

class ConfigController extends Controller
{

    public function languagePage(){
        $languages = WebsiteLanguage::orderBy('serial', 'asc')->get();
        return view('backend.language', compact('languages'));
    }

    public function setDefaultLanguage($languageCode, $value){
        WebsiteLanguage::where('code', $languageCode)->update(['status' => $value]);

        if($value == 1){
            WebsiteLanguage::where('code', '!=', $languageCode)->update(['status' => 0]);
        } else {
            WebsiteLanguage::where('code', '!=', $languageCode)->update(['status' => 1]);
        }

        return response()->json(['success'=> 'Updated Successfully']);
    }

    // sms gateway
    public function viewSmsGateways(){
        $gateways = SmsGateway::orderBy('id', 'asc')->get();
        return view('backend.sms_gateway', compact('gateways'));
    }

    public function updateSmsGatewayInfo(Request $request){
        $provider = $request->provider;

        DB::table('sms_gateways')->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);

        if($provider == 'elitbuzz'){ //ID 1 => Elitbuzz
            SmsGateway::where('id', 1)->update([
                'api_endpoint' => $request->api_endpoint,
                'api_key' => $request->api_key,
                'sender_id' => $request->sender_id,
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'revesms'){ //ID 2 => Revesms
            SmsGateway::where('id', 2)->update([
                'api_endpoint' => $request->api_endpoint,
                'api_key' => $request->api_key,
                'secret_key' => $request->secret_key,
                'sender_id' => $request->sender_id,
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
        }

        Toastr::success('Info Updated', 'Success');
        return back();

    }

    // payment gateway
    public function viewPaymentGateways(){
        $gateways = PaymentGateway::orderBy('id', 'asc')->get();
        return view('backend.payment_gateway', compact('gateways'));
    }

    public function updatePaymentGatewayInfo(Request $request){
        $provider = $request->provider_name;

        if($provider == 'ssl_commerz'){
            PaymentGateway::where('id', 1)->update([
                'api_key' => $request->api_key,
                'secret_key' => $request->secret_key,
                'username' => $request->username,
                'password' => $request->password,
                'live' => $request->live == '' ? 0 : $request->live,
                'status' => $request->status,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'stripe'){
            PaymentGateway::where('id', 2)->update([
                'api_key' => $request->api_key,
                'secret_key' => $request->secret_key,
                'username' => $request->username,
                'password' => $request->password,
                'live' => $request->live == '' ? 0 : $request->live,
                'status' => $request->status,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'bkash'){
            PaymentGateway::where('id', 3)->update([
                'api_key' => $request->api_key,
                'secret_key' => $request->secret_key,
                'username' => $request->username,
                'password' => $request->password,
                'live' => $request->live == '' ? 0 : $request->live,
                'status' => $request->status,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'amar_pay'){
            PaymentGateway::where('id', 4)->update([
                'api_key' => $request->api_key,
                'secret_key' => $request->secret_key,
                'username' => $request->username,
                'password' => $request->password,
                'live' => $request->live == '' ? 0 : $request->live,
                'status' => $request->status,
                'updated_at' => Carbon::now()
            ]);
        }

        Toastr::success('Payment Gateway Info Updated', 'Updated Successfully');
        return back();

    }

    public function changePaymentGatewayStatus($provider){

        if($provider == 'ssl_commerz'){ //ID 1 => ssl_commerz
            $info = PaymentGateway::where('id', 1)->first();

            PaymentGateway::where('id', 1)->update([
                'status' => $info->status == 1 ? 0 : 1,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'stripe'){ //ID 2 => stripe
            $info = PaymentGateway::where('id', 2)->first();

            PaymentGateway::where('id', 2)->update([
                'status' => $info->status == 1 ? 0 : 1,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'bkash'){ //ID 3 => bkash
            $info = PaymentGateway::where('id', 3)->first();

            PaymentGateway::where('id', 3)->update([
                'status' => $info->status == 1 ? 0 : 1,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'amar_pay'){ //ID 4 => amar_pay
            $info = PaymentGateway::where('id', 4)->first();

            PaymentGateway::where('id', 4)->update([
                'status' => $info->status == 1 ? 0 : 1,
                'updated_at' => Carbon::now()
            ]);
        }

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function changeGatewayStatus($provider){

        DB::table('sms_gateways')->update([
            'status' => 0,
            'updated_at' => Carbon::now()
        ]);

        if($provider == 'elitbuzz'){ //ID 1 => Elitbuzz
            SmsGateway::where('id', 1)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
        }

        if($provider == 'revesms'){ //ID 2 => Revesms
            SmsGateway::where('id', 2)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
        }

        return response()->json(['success' => 'Updated Successfully.']);
    }


    // functions for BiodatType
    public function viewAllBiodataType(Request $request){
        if ($request->ajax()) {

            $data = BiodataType::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Active</span>";
                        }else{
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Inactive</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="mb-1 btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        if(!in_array($data->id, [1, 2])){
                            $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }

        return view('backend.config.biodata_type');
    }

    public function addNewBiodataType(Request $request){

        BiodataType::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'serial' => BiodataType::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Saved Successfully']);
    }

    public function deleteBiodataType($id){
        BiodataType::where('id', $id)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function biodataType($id){
        $data = BiodataType::where('id', $id)->first();
        return response()->json($data);
    }

    public function updateBiodataType(Request $request){
        BiodataType::where('id', $request->biodatatype_id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Updated Successfully']);
    }

    public function rearrangeBiodataType(){
        $data = BiodataType::orderBy('serial', 'asc')->get();
        return view('backend.config.rearrange_biodatatype', compact('data'));
    }

    public function saveRearrangeBiodataType(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            BiodataType::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/biodatatype');
    }

     // functions for Marital Condition
     public function viewAllMaritalCondition(Request $request){
        if ($request->ajax()) {

            $data = MaritalCondition::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Active</span>";
                        }else{
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Inactive</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="mb-1 btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        if(!in_array($data->id, [1,2,3,4,5])){
                            $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }

        return view('backend.config.marital_condition');
    }

    public function addNewMaritalCondition(Request $request){

        MaritalCondition::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'serial' => BiodataType::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Saved Successfully']);
    }

    public function deleteMaritalCondition($id){
        MaritalCondition::where('id', $id)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function maritalCondition($id){
        $data = MaritalCondition::where('id', $id)->first();
        return response()->json($data);
    }

    public function updateMaritalCondition(Request $request){
        MaritalCondition::where('id', $request->maritalcondition_id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Updated Successfully']);
    }

    public function rearrangeMaritalCondition(){
        $data = MaritalCondition::orderBy('serial', 'asc')->get();
        return view('backend.config.rearrange_marital_condition', compact('data'));
    }

    public function saveRearrangeMaritalCondition(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            MaritalCondition::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/marital/condition');
    }

     // functions for Question Set
     public function viewAllQuestionSets(Request $request){
        if ($request->ajax()) {

            $data = QuestionSet::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Active</span>";
                        }else{
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Inactive</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="mb-1 btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        if(!in_array($data->id, [1,2,3,4,5,6])){
                            $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }
        return view('backend.config.question_set');
    }

    public function addNewQuestionSet(Request $request){

        QuestionSet::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'serial' =>  QuestionSet::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Saved Successfully']);
    }

    public function deleteQuestionSet($id){
        QuestionSet::where('id', $id)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function questionSet($id){
        $data = QuestionSet::where('id', $id)->first();
        return response()->json($data);
    }

    public function updateQuestionSet(Request $request){
        QuestionSet::where('id', $request->questionset_id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        return response()->json(['success' => 'Updated Successfully']);
    }

    public function rearrangeQuestionSet(){
        $data = QuestionSet::orderBy('serial', 'asc')->get();
        return view('backend.config.rearrange_question_set', compact('data'));
    }

    public function saveRearrangeQuestionSet(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            QuestionSet::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/question/set');
    }


}
