<?php

namespace App\Http\Controllers;
use App\Models\BioData;
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


    public function viewPendingBiodatas(Request $request){
        if ($request->ajax()) {

            $data = DB::table('bio_data')
                        ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                        ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                        ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                        ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                        ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                        ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                        ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn',)
                        ->where('bio_data.status', 0)
                        ->orderBy('id', 'desc')
                        ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    if ($data->image && file_exists(public_path($data->image)))
                        return url($data->image);
                })
                ->editColumn('height_foot', function ($data) {
                    return $data->height_foot . "′ " . $data->height_inch . "′′";
                })
                ->editColumn('birth_date', function ($data) {
                    return date('jS M, Y', strtotime($data->birth_date));
                })
                ->editColumn('skin_tone', function ($data) {
                        if ($data->skin_tone == 1) {
                            return __('label.skin_tone_black');
                        }
                        elseif ($data->skin_tone == 2) {
                            return __('label.skin_tone_brown');
                        }
                        elseif ($data->skin_tone == 3) {
                            return __('label.skin_tone_bright_brown');
                        }
                        elseif($data->skin_tone == 4){
                            return __('label.skin_tone_white');
                        }
                        else{
                            return __('label.skin_tone_bright_white');
                        }
                    })
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Approved</span>";
                        } elseif($data->status == 0){
                            return "<span class='btn btn-sm btn-info rounded' style='padding: .1rem .5rem !important;'>Pending</span>";
                        } else {
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Blocked</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('edit/biodata')."/".$data->slug.'" class="mb-1 btn-sm btn-warning rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }
        return view('backend.biodata.pending');
    }

    public function viewApprovedBiodatas(Request $request){
        if ($request->ajax()) {

            $data = DB::table('bio_data')
                        ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                        ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                        ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                        ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                        ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                        ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                        ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn',)
                        ->where('bio_data.status', 1)
                        ->orderBy('id', 'desc')
                        ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    if ($data->image && file_exists(public_path($data->image)))
                        return url($data->image);
                })
                ->editColumn('height_foot', function ($data) {
                    return $data->height_foot . "′ " . $data->height_inch . "′′";
                })
                ->editColumn('birth_date', function ($data) {
                    return date('jS M, Y', strtotime($data->birth_date));
                })
                ->editColumn('skin_tone', function ($data) {
                        if ($data->skin_tone == 1) {
                            return __('label.skin_tone_black');
                        }
                        elseif ($data->skin_tone == 2) {
                            return __('label.skin_tone_brown');
                        }
                        elseif ($data->skin_tone == 3) {
                            return __('label.skin_tone_bright_brown');
                        }
                        elseif($data->skin_tone == 4){
                            return __('label.skin_tone_white');
                        }
                        else{
                            return __('label.skin_tone_bright_white');
                        }
                    })
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Approved</span>";
                        } elseif($data->status == 0){
                            return "<span class='btn btn-sm btn-info rounded' style='padding: .1rem .5rem !important;'>Pending</span>";
                        } else {
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Blocked</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('edit/biodata')."/".$data->slug.'" class="mb-1 btn-sm btn-warning rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }
        return view('backend.biodata.approved');
    }

    public function viewBlockedBiodatas(Request $request){
        if ($request->ajax()) {

            $data = DB::table('bio_data')
                        ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                        ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                        ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                        ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                        ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                        ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                        ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                        ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn', 'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn', 'countries.nationality as nationality_label', 'districts.name as permenant_district_name', 'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name', 'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name', 'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name', 'present_upazila.bn_name as present_upazila_name_bn',)
                        ->where('bio_data.status', 2)
                        ->orderBy('id', 'desc')
                        ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    if ($data->image && file_exists(public_path($data->image)))
                        return url($data->image);
                })
                ->editColumn('height_foot', function ($data) {
                    return $data->height_foot . "′ " . $data->height_inch . "′′";
                })
                ->editColumn('birth_date', function ($data) {
                    return date('jS M, Y', strtotime($data->birth_date));
                })
                ->editColumn('skin_tone', function ($data) {
                        if ($data->skin_tone == 1) {
                            return __('label.skin_tone_black');
                        }
                        elseif ($data->skin_tone == 2) {
                            return __('label.skin_tone_brown');
                        }
                        elseif ($data->skin_tone == 3) {
                            return __('label.skin_tone_bright_brown');
                        }
                        elseif($data->skin_tone == 4){
                            return __('label.skin_tone_white');
                        }
                        else{
                            return __('label.skin_tone_bright_white');
                        }
                    })
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Approved</span>";
                        } elseif($data->status == 0){
                            return "<span class='btn btn-sm btn-info rounded' style='padding: .1rem .5rem !important;'>Pending</span>";
                        } else {
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Blocked</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('edit/biodata')."/".$data->slug.'" class="mb-1 btn-sm btn-warning rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }
        return view('backend.biodata.blocked');
    }

    public function editBiodata($slug){

        $data = DB::table('bio_data')
                    ->leftJoin('biodata_types', 'bio_data.biodata_type_id', 'biodata_types.id')
                    ->leftJoin('marital_conditions', 'bio_data.marital_condition_id', 'marital_conditions.id')
                    ->leftJoin('countries', 'bio_data.nationality', 'countries.id')
                    ->leftJoin('districts', 'bio_data.permenant_district_id', 'districts.id')
                    ->leftJoin('districts as present_district', 'bio_data.present_district_id', 'present_district.id')
                    ->leftJoin('upazilas', 'bio_data.permenant_upazila_id', 'upazilas.id')
                    ->leftJoin('upazilas as present_upazila', 'bio_data.present_upazila_id', 'present_upazila.id')
                    ->select('bio_data.*', 'biodata_types.title as biodata_type', 'biodata_types.title_bn as biodata_type_bn',
                    'marital_conditions.title as marital_condition', 'marital_conditions.title_bn as marital_condition_bn',
                    'countries.nationality as nationality_label', 'districts.name as permenant_district_name',
                    'districts.bn_name as permenant_district_name_bn', 'upazilas.name as permenant_upazila_name',
                    'upazilas.bn_name as permenant_upazila_name_bn', 'present_district.name as present_district_name',
                    'present_district.bn_name as present_district_name_bn', 'present_upazila.name as present_upazila_name',
                    'present_upazila.bn_name as present_upazila_name_bn',)
                    ->where('bio_data.slug', $slug)
                    ->orderBy('id', 'desc')
                    ->first();

        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('backend.biodata.details', compact('data', 'questionSets'));
    }

    public function changeBiodataStatus(Request $request){
        BioData::where('id', $request->biodata_id)->update([
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        Toastr::success('Status Changed Successfully', 'Success');
        return back();
    }


}
