<?php

namespace App\Http\Controllers;

use App\Models\HomepageStatisticsConfig;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\HomepageStatistics;
use Yajra\DataTables\DataTables;

class HomepageStatisticsController extends Controller
{
    public function homePageStatisticsConfig(){
        $data = HomepageStatisticsConfig::where('id', 1)->first();
        return view("backend.homepage.statistics_config", compact('data'));
    }

    public function updateHomePageStatisticsConfig(Request $request){
        HomepageStatisticsConfig::where('id', 1)->update([
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

    public function viewHomePageStatistics(Request $request){
        if ($request->ajax()) {

            $data = HomepageStatistics::orderBy('serial', 'asc')->get();

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
                        $btn = ' <a href="'.url('/edit/homepage/statistic')."/".$data->id.'" class="btn-sm btn-warning rounded"><i class="bi bi-pencil-square"></i></a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }
        return view('backend.homepage.statistics');
    }

    public function addHomePageStatistic(){
        return view('backend.homepage.add_statistic');
    }

    public function saveHomePageStatistic(Request $request){
        HomepageStatistics::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'number' => $request->number,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'serial' => HomepageStatistics::min('serial') - 1,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('New Data Added', 'Success');
        return redirect('view/homepage/statistics');
    }

    public function deleteHomePageStatistic($id){
        HomepageStatistics::where('id', $id)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editHomePageStatistic($id){
        $data = HomepageStatistics::where('id', $id)->first();
        return view('backend.homepage.edit_statistic', compact('data'));
    }

    public function updateHomePageStatistic(Request $request){
        HomepageStatistics::where('id', $request->id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'number' => $request->number,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);
        return redirect('view/homepage/statistics');
    }

    public function rearrangeHomePageStatistics(){
        $data = HomepageStatistics::orderBy('serial', 'asc')->get();
        return view('backend.homepage.rearrange_statistics', compact('data'));
    }

    public function saveRearrangedHomePageStatistics(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            HomepageStatistics::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/homepage/statistics');
    }
}
