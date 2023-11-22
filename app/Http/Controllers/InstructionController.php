<?php

namespace App\Http\Controllers;
use App\Models\InstructionConfig;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class InstructionController extends Controller
{
    public function instructionConfig(){
        $data = InstructionConfig::where('id', 1)->first();
        return view("backend.instruction.instruction_config", compact('data'));
    }

    public function updateInstructionConfig(Request $request){
        InstructionConfig::where('id', 1)->update([
            'background_image' => $request->background_image != '' ? parse_url($request->background_image)['path'] : null,
            'background_color' => $request->background_color,
            'priority' => $request->priority,
            'page_title' => $request->page_title,
            'page_title_bn' => $request->page_title_bn,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Data has been Updated', 'Success');
        return back();
    }

    public function addInstruction(){
        return view('backend.instruction.create');
    }

    public function saveInstruction(Request $request){

        Instruction::insert([
            'question' => $request->question,
            'question_bn' => $request->question_bn,
            'answer' => $request->answer,
            'answer_bn' => $request->answer_bn,
            'slug' => time().str::random(5),
            'status' => 1,
            'serial' => Instruction::min('serial') - 1,
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Data has been Saved', 'Success');
        return back();
    }

    public function viewAllInstructions(Request $request){
        if ($request->ajax()) {
            $data =  Instruction::orderBy('serial', 'asc')->get();
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
                        $btn = ' <a href="'.url('edit/instruction').'/'.$data->slug.'" class="mb-1 d-inline-block btn-sm btn-warning rounded editBtn"><i class="bi bi-pencil-square"></i> Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->slug.'" data-original-title="Delete" class="d-inline-block btn-sm btn-danger rounded deleteBtn"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
        }

        return view('backend.instruction.view');
    }

    public function deleteInstruction($slug){
        Instruction::where('slug', $slug)->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function editInstruction($slug){
        $data =  Instruction::where('slug', $slug)->first();
        return view('backend.instruction.update', compact('data'));
    }

    public function updateInstruction(Request $request){

        Instruction::where('slug', $request->slug)->update([
            'question' => $request->question,
            'question_bn' => $request->question_bn,
            'answer' => $request->answer,
            'answer_bn' => $request->answer_bn,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success(' Instructions Updated', 'Success');
        return redirect('view/all/instructions');
    }

    public function rearrangeInstructions(){
        $data =  Instruction::orderBy('serial', 'asc')->get();
        return view('backend.instruction.rearrange', compact('data'));
    }

    public function saveRearrangedInstructions(Request $request){
        $sl = 1;
        foreach($request->slug as $slug){
            Instruction::where('slug', $slug)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/instructions');
    }
}
