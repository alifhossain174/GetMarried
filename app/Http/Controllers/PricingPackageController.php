<?php

namespace App\Http\Controllers;

use App\Models\PricingPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class PricingPackageController extends Controller
{
    public function viewPricingPackage(Request $request){
        if ($request->ajax()) {

            $data = PricingPackage::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function($data) {
                    if($data->status == 1){
                        return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Active</span>";
                    } else {
                        return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Inactive</span>";
                    }
                })
                ->addColumn('action', function($data){
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Edit" class="mb-1 btn-sm btn-warning rounded d-inline-block editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn d-inline-block"><i class="bi bi-trash"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }
        return view('backend.pricing_package.view');
    }

    public function savePricingPackage(Request $request){
        PricingPackage::insert([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'connections' => $request->connections,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'serial' => PricingPackage::min('serial')-1,
            'slug' => str::random(5).time(),
            'created_at' => Carbon::now()
        ]);
        return response()->json(['success'=> 'Saved Successfully']);
    }

    public function deletePricingPackage($slug){
        PricingPackage::where('slug', $slug)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function getPricingPackageInfo($slug){
        $data = PricingPackage::where('slug', $slug)->first();
        return response()->json($data);
    }

    public function updatePricingPackageInfo(Request $request){
        PricingPackage::where('id', $request->package_id)->update([
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'connections' => $request->connections,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'serial' => PricingPackage::min('serial')-1,
            'slug' => str::random(5).time(),
            'created_at' => Carbon::now()
        ]);
        return response()->json(['success'=> 'Updated Successfully']);
    }

    public function rearrangePricingPackages(Request $request){
        $data = PricingPackage::orderBy('serial', 'asc')->get();
        return view('backend.pricing_package.rearrange', compact('data'));
    }

    public function saveRearrangedPricingPackages(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            PricingPackage::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/pricing/packages');
    }
}
