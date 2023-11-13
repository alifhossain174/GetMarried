<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\PersonnelSpeech;
use App\Models\PrincipalMessageConfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PersonnelMessageController extends Controller
{
    public function pageTitle(){
        $data = PrincipalMessageConfig::where('id', 1)->first();
        return view('backend.personnel_message.page_title', compact('data'));
    }

    public function updatePageTitle(Request $request){
        PrincipalMessageConfig::where('id', 1)->update([
            'page_title' => $request->page_title,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function addNewPersonnel(){
        return view('backend.personnel_message.add_personnel');
    }

    public function savePersonnel(Request $request){

        $request->validate([
            'image' => ['required'],
        ]);

        Personnel::insert([
            'designated_title' => $request->designated_title,
            'name' => $request->name,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'speech' => $request->speech,
            'slug' => time().str::random(5),
            'status' => 1,
            'serial' => Personnel::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Saved', 'Success');
        return back();

    }

    public function viewAllPersonnels(Request $request){
        if ($request->ajax()) {

            $data = Personnel::orderBy('serial', 'asc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image', function($data) {
                        if($data->image && file_exists(public_path($data->image)))
                            return url($data->image);
                    })
                    ->editColumn('status', function($data) {
                        if($data->status == 1){
                            return "<span class='btn btn-sm btn-success rounded' style='padding: .1rem .5rem !important;'>Active</span>";
                        }else{
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Inactive</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('edit/personnel').'/'.$data->slug.'" class="mb-1 btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }

        return view('backend.personnel_message.view_personnel');
    }

    public function deletePersonnel($slug){
        Personnel::where('slug', $slug)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editPersonnel($slug){
        $data = Personnel::where('slug', $slug)->first();
        return view('backend.personnel_message.update_personnel', compact('data'));
    }

    public function updatePersonnel(Request $request){

        $request->validate([
            'image' => ['required'],
        ]);

        Personnel::where('id', $request->personnel_id)->update([
            'designated_title' => $request->designated_title,
            'name' => $request->name,
            'image' => $request->image != '' ? parse_url($request->image)['path'] : null,
            'speech' => $request->speech,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return redirect('/view/all/personnels');
    }

    public function rearrangePersonnel(){
        $data = Personnel::orderBy('serial', 'asc')->get();
        return view('backend.personnel_message.rearrange', compact('data'));
    }

    public function saveRearrangedPersonnels(Request $request){
        $sl = 1;
        foreach($request->slug as $slug){
            Personnel::where('slug', $slug)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/personnels');
    }

    public function addPersonnelSpeech(){
        return view('backend.personnel_message.add_personnel_speech');
    }

    public function savePersonnelSpeech(Request $request){

        PersonnelSpeech::insert([
            'personnel_id' => $request->personnel_id,
            'speech_title' => $request->speech_title,
            'speech' => $request->speech,
            'slug' => time().str::random(5),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Saved', 'Success');
        return back();
    }

    public function viewPersonnelSpeech(Request $request){
        if ($request->ajax()) {

            $data =  DB::table('personnel_speeches')
                        ->join('personnels', 'personnel_speeches.personnel_id', '=', 'personnels.id')
                        ->select('personnel_speeches.*', 'personnels.name')
                        ->orderBy('id', 'desc')
                        ->get();

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
                        $btn = ' <a href="'.url('edit/personnel/speech').'/'.$data->slug.'" class="mb-1 btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);

        }

        return view('backend.personnel_message.view_personnel_speech');
    }

    public function deletePersonnelSpeech($slug){
        PersonnelSpeech::where('slug', $slug)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editPersonnelSpeech($slug){
        $data = PersonnelSpeech::where('slug', $slug)->first();
        return view('backend.personnel_message.update_personnel_speech', compact('data'));
    }

    public function updatePersonnelSpeech(Request $request){

        PersonnelSpeech::where('id', $request->speech_id)->update([
            'personnel_id' => $request->personnel_id,
            'speech_title' => $request->speech_title,
            'speech' => $request->speech,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return redirect('/view/personnel/speech');
    }

}
