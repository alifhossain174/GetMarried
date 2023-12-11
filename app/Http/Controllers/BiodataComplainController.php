<?php

namespace App\Http\Controllers;

use App\Models\BiodataComplain;
use App\Models\ComplainMessage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BiodataComplainController extends Controller
{
    public function viewPendingBiodataComplains(Request $request){
        if ($request->ajax()) {

            $data = DB::table('biodata_complains')
                    ->leftJoin('bio_data', 'biodata_complains.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'biodata_complains.submitted_by', 'users.id')
                    ->select('biodata_complains.*', 'bio_data.biodata_no')
                    ->where('biodata_complains.status', 0)
                    ->orderBy('biodata_complains.id', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($data) {
                        return date('H:i:s d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('reason', function ($data) {
                        if($data->reason == 1){
                            return 'Wrong Contact Info';
                        } elseif($data->reason == 2){
                            return 'Wrong Biodata Info';
                        } else {
                            return 'Others';
                        }
                    })
                    ->editColumn('attachment', function ($data) {
                        if($data->attachment){
                            return "<a href='".url($data->attachment)."'download>Download</a>";
                        }
                    })
                    ->editColumn('status', function ($data) {
                        if($data->status == 0){
                            return 'Pending';
                        } elseif($data->status == 1){
                            return 'In Progress';
                        } elseif($data->status == 2){
                            return 'Complete';
                        } else {
                            return 'Cancelled';
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('view/complain/messages')."/".$data->slug.'" class="mb-1 btn-sm btn-info rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Approve" class="btn-sm mb-1 d-inline-block btn-success rounded approveBtn"><i class="bi-check-lg"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Cancel" class="btn-sm mb-1 d-inline-block btn-warning rounded cancelBtn"><i class="bi-x-circle"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'attachment'])
                    ->make(true);

        }
        return view('backend.biodata_complain.pending');
    }

    public function viewRunningBiodataComplains(Request $request){
        if ($request->ajax()) {

            $data = DB::table('biodata_complains')
                    ->leftJoin('bio_data', 'biodata_complains.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'biodata_complains.submitted_by', 'users.id')
                    ->select('biodata_complains.*', 'bio_data.biodata_no')
                    ->where('biodata_complains.status', 1)
                    ->orderBy('biodata_complains.id', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($data) {
                        return date('H:i:s d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('reason', function ($data) {
                        if($data->reason == 1){
                            return 'Wrong Contact Info';
                        } elseif($data->reason == 2){
                            return 'Wrong Biodata Info';
                        } else {
                            return 'Others';
                        }
                    })
                    ->editColumn('attachment', function ($data) {
                        if($data->attachment){
                            return "<a href='".url($data->attachment)."'download>Download</a>";
                        }
                    })
                    ->editColumn('status', function ($data) {
                        if($data->status == 0){
                            return 'Pending';
                        } elseif($data->status == 1){
                            return 'In Progress';
                        } elseif($data->status == 2){
                            return 'Complete';
                        } else {
                            return 'Cancelled';
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('view/complain/messages')."/".$data->slug.'" class="mb-1 btn-sm btn-info rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Approve" class="btn-sm mb-1 d-inline-block btn-success rounded approveBtn"><i class="bi-check-lg"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Cancel" class="btn-sm mb-1 d-inline-block btn-warning rounded cancelBtn"><i class="bi-x-circle"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'attachment'])
                    ->make(true);

        }
        return view('backend.biodata_complain.running');
    }

    public function viewCompleteBiodataComplains(Request $request){
        if ($request->ajax()) {

            $data = DB::table('biodata_complains')
                    ->leftJoin('bio_data', 'biodata_complains.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'biodata_complains.submitted_by', 'users.id')
                    ->select('biodata_complains.*', 'bio_data.biodata_no')
                    ->where('biodata_complains.status', 2)
                    ->orderBy('biodata_complains.id', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($data) {
                        return date('H:i:s d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('reason', function ($data) {
                        if($data->reason == 1){
                            return 'Wrong Contact Info';
                        } elseif($data->reason == 2){
                            return 'Wrong Biodata Info';
                        } else {
                            return 'Others';
                        }
                    })
                    ->editColumn('attachment', function ($data) {
                        if($data->attachment){
                            return "<a href='".url($data->attachment)."'download>Download</a>";
                        }
                    })
                    ->editColumn('status', function ($data) {
                        if($data->status == 0){
                            return 'Pending';
                        } elseif($data->status == 1){
                            return 'In Progress';
                        } elseif($data->status == 2){
                            return 'Complete';
                        } else {
                            return 'Cancelled';
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('view/complain/messages')."/".$data->slug.'" class="mb-1 btn-sm btn-info rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'attachment'])
                    ->make(true);

        }
        return view('backend.biodata_complain.complete');
    }

    public function viewCancelledBiodataComplains(Request $request){
        if ($request->ajax()) {

            $data = DB::table('biodata_complains')
                    ->leftJoin('bio_data', 'biodata_complains.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'biodata_complains.submitted_by', 'users.id')
                    ->select('biodata_complains.*', 'bio_data.biodata_no')
                    ->where('biodata_complains.status', 3)
                    ->orderBy('biodata_complains.id', 'desc')
                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($data) {
                        return date('H:i:s d-m-Y', strtotime($data->created_at));
                    })
                    ->editColumn('reason', function ($data) {
                        if($data->reason == 1){
                            return 'Wrong Contact Info';
                        } elseif($data->reason == 2){
                            return 'Wrong Biodata Info';
                        } else {
                            return 'Others';
                        }
                    })
                    ->editColumn('attachment', function ($data) {
                        if($data->attachment){
                            return "<a href='".url($data->attachment)."'download>Download</a>";
                        }
                    })
                    ->editColumn('status', function ($data) {
                        if($data->status == 0){
                            return 'Pending';
                        } elseif($data->status == 1){
                            return 'In Progress';
                        } elseif($data->status == 2){
                            return 'Complete';
                        } else {
                            return 'Cancelled';
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('view/complain/messages')."/".$data->slug.'" class="mb-1 btn-sm btn-info rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'attachment'])
                    ->make(true);

        }
        return view('backend.biodata_complain.cancelled');
    }

    public function deleteBiodataComplain($slug){
        $complain = BiodataComplain::where('slug', $slug)->first();
        if($complain->attachment && file_exists(public_path($complain->attachment))){
            unlink(public_path($complain->attachment));
        }
        $messages = ComplainMessage::where('complain_id', $complain->id)->get();
        foreach($messages as $item){
            if($item->attachment && file_exists(public_path($item->attachment))){
                unlink(public_path($item->attachment));
            }
            $item->delete();
        }
        $complain->delete();
        return response()->json(['success'=> 'Deleted Successfully']);
    }

    public function approveBiodataComplain($slug){
        $complain = BiodataComplain::where('slug', $slug)->first();
        $complain->status = $complain->status+1;
        $complain->save();
        return response()->json(['success'=> 'Approved Successfully']);
    }

    public function cancelBiodataComplain($slug){
        $complain = BiodataComplain::where('slug', $slug)->first();
        $complain->status = 3;
        $complain->save();
        return response()->json(['success'=> 'Cancelled Successfully']);
    }

    public function viewComplainMessages($slug){
        $complain = BiodataComplain::where('slug', $slug)->first();
        $messages = ComplainMessage::where('complain_id', $complain->id)->orderBy('id', 'asc')->get();
        return view('backend.biodata_complain.messages', compact('complain', 'messages'));
    }

    public function replyComplainMessage(Request $request){

        $attachment = null;
        if ($request->hasFile('attachment')){
            $get_image = $request->file('attachment');
            $image_name = str::random(5) . time() . '.' . $get_image->getClientOriginalExtension();
            $location = public_path('complain_attachments/');
            $get_image->move($location, $image_name);
            $attachment = "complain_attachments/" . $image_name;
        }

        ComplainMessage::insert([
            'complain_id' => $request->complain_id,
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            'attachment' => $attachment,
            'user_type' => 2,
            'slug' => str::random(5).time(),
            'status' => 0,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Message Sent Successfully', 'Sent !');
        return back();
    }
}
