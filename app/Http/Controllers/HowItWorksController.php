<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use App\Models\HowItWorksConfig;
use App\Models\HowItWorks;

class HowItWorksController extends Controller
{
    public function howItWorksConfig(){
        $data = HowItWorksConfig::where('id', 1)->first();
        return view("backend.homepage.how_it_works_config", compact('data'));
    }

    public function updateHowItWorksConfig(Request $request){
        HowItWorksConfig::where('id', 1)->update([
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'section_title' => $request->section_title,
            'section_title_bn' => $request->section_title_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function viewHowItWorks(Request $request){
        if ($request->ajax()) {

            $data = HowItWorks::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return '<span class="btn-sm btn-success rounded">Active</span>';
                        } else {
                            return '<span class="btn-sm btn-danger rounded">Inactive</span>';
                        }
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('/edit/how/it/works')."/".$data->id.'" class="btn-sm btn-warning rounded d-inline-block mb-1"><i class="bi bi-pencil-square"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="d-inline-block btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        return view('backend.homepage.how_it_works');
    }

    public function addHowItWorks(){
        return view('backend.homepage.add_how_it_works');
    }

    public function saveHowItWorks(Request $request){
        HowItWorks::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'description' => $request->description,
            'description_bn' => $request->description_bn,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'serial' => HowItWorks::min('serial') - 1,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('New Data Added', 'Success');
        return redirect('view/how/it/works');
    }

    public function deleteHowItWorks($id){
        HowItWorks::where('id', $id)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editHowItWorks($id){
        $data = HowItWorks::where('id', $id)->first();
        return view('backend.homepage.edit_how_it_works', compact('data'));
    }

    public function updateHowItWorks(Request $request){
        HowItWorks::where('id', $request->id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'description' => $request->description,
            'description_bn' => $request->description_bn,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        return redirect('view/how/it/works');
    }

    public function rearrangeHowItWorks(){
        $data = HowItWorks::orderBy('serial', 'asc')->get();
        return view('backend.homepage.rearrange_how_it_works', compact('data'));
    }

    public function saveRearrangedHowItWorks(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            HowItWorks::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/how/it/works');
    }
}
