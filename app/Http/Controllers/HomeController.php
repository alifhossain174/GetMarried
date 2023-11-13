<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\GoogleRecaptcha;
use App\Models\User;
use App\Models\SchoolInfo;
use App\Models\SchoolCommittee;
use App\Models\SubjectGroup;
use App\Models\SchoolClass;
use App\Models\Notice;
use App\Models\Shift;
use App\Models\AboutUs;
use App\Models\PublicExam;
use App\Models\PublicExamResult;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function contactRequests(Request $request)
    {
        if ($request->ajax()) {

            $data = ContactRequest::orderBy('id', 'desc')->get();

            return Datatables::of($data)
                ->editColumn('status', function ($data) {
                    if ($data->status == 0) {

                        $btn = "Pending";
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Approved" class="btn btn-success rounded btn-sm approveStatus"><i class="uil uil-check"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Denied" class="btn btn-danger rounded btn-sm denyStatus">X</i></a>';
                        return $btn;
                    } elseif ($data->status == 1) {
                        return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Approved</span>";
                    } else {
                        return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Denied</span>";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('backend.contact_requests');
    }


    public function approveContactRequest($slug)
    {
        ContactRequest::where('slug', $slug)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return back();
    }
    public function denyContactRequest($slug)
    {
        ContactRequest::where('slug', $slug)->update([
            'status' => 2,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return back();
    }

    public function deleteRequest($slug)
    {
        ContactRequest::where('slug', $slug)->delete();
        Toastr::error('Review Deleted Successfully', 'Deleted');
        return back();
    }

    public function changePasswordPage()
    {
        return view('backend.change_password');
    }

    public function changePassword(Request $request)
    {
        $currentPassword = $request->prev_password;
        $newPassword = $request->new_password;
        $userId = Auth::user()->id;
        $userInfo = User::where('id', $userId)->first();

        if (Hash::check($currentPassword, $userInfo->password)) {

            if (strlen($request->new_password) < 6) {
                Toastr::error('Minimum Password Length is 6', 'Failed');
                return back();
            }

            User::where('id', $userId)->update([
                'name' => $request->name,
                'password' => Hash::make($newPassword),
            ]);

            Toastr::success('Password Changed', 'Successfully');
            return back();
        } else {
            Toastr::error('Current Password is Wrong', 'Failed');
            return back();
        }
    }

    public function googleRecaptchaPage(){
        $data = GoogleRecaptcha::where('id', 1)->first();
        return view('backend.google_recaptcha', compact('data'));
    }

    public function updateGoogleRecaptcha(Request $request){
        GoogleRecaptcha::where('id', 1)->update([
            'recaptcha_key' => $request->recaptcha_key,
            'recaptcha_secret' => $request->recaptcha_secret,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        Toastr::success('Successfully Updated', 'Success');
        return back();
    }
}
