<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class BiodataComplainController extends Controller
{
    public function viewPendingBiodataComplains(Request $request){
        if ($request->ajax()) {

            $data = DB::table('biodata_complains')
                    ->leftJoin('bio_data', 'biodata_complains.biodata_id', 'bio_data.id')
                    ->leftJoin('users', 'biodata_complains.submitted_by', 'users.id')
                    ->select('biodata_complains.*', 'bio_data.biodata_no')
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
                        } elseif($data->reason == 1){
                            return 'In Progress';
                        } elseif($data->reason == 2){
                            return 'Complete';
                        } else {
                            return 'Cancelled';
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('view/complain/messages')."/".$data->slug.'" class="mb-1 btn-sm btn-warning rounded d-inline-block"><i class="bi bi-pencil-square"></i> View</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $data->slug . '" data-original-title="Delete" class="btn-sm mb-1 d-inline-block btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'attachment'])
                    ->make(true);

        }
        return view('backend.biodata_complain.pending');
    }
}
