<?php

namespace App\Http\Controllers;
use App\Models\FaqConfig;
use App\Models\Faq;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class FaqController extends Controller
{
    public function faqConfig(){
        $data = FaqConfig::where('id', 1)->first();
        return view("backend.faq.faq_config", compact('data'));
    }

    public function updateFaqConfig(Request $request){
        FaqConfig::where('id', 1)->update([
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'section_title' => $request->section_title,
            'section_title_bn' => $request->section_title_bn,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function addFaq(){
        return view('backend.faq.create');
    }

    public function saveFaq(Request $request){

        Faq::insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'slug' => time().str::random(5),
            'status' => 1,
            'serial' => Faq::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Saved', 'Success');
        return back();
    }

    public function viewAllFaqs(Request $request){
        if ($request->ajax()) {
            $data =  Faq::orderBy('serial', 'asc')->get();
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
                        $btn = ' <a href="'.url('edit/faq').'/'.$data->slug.'" class="mb-1 d-inline-block btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Delete" class="d-inline-block btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }

        return view('backend.faq.view');
    }

    public function deleteFaq($slug){
        Faq::where('slug', $slug)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editFaq($slug){
        $data =  Faq::where('slug', $slug)->first();
        return view('backend.faq.update', compact('data'));
    }

    public function updateFaq(Request $request){

        Faq::where('slug', $request->slug)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'slug' => time().str::random(5),
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success(' Faqs Updated', 'Success');
        return redirect('view/all/faqs');
    }

    public function rearrangeFaqs(){
        $data =  Faq::orderBy('serial', 'asc')->get();
        return view('backend.faq.rearrange', compact('data'));
    }

    public function saveRearrangedFaqs(Request $request){
        $sl = 1;
        foreach($request->slug as $slug){
            Faq::where('slug', $slug)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/faqs');
    }
}
