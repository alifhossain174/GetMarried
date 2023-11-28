<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionSet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class QuestionController extends Controller
{
    public function viewAllQuestions(Request $request){
        if ($request->ajax()) {

            $data = DB::table('questions')
                        ->leftJoin('question_sets', 'questions.question_set_id', '=', 'question_sets.id')
                        ->select('questions.*', 'question_sets.title', 'question_sets.serial')
                        ->orderBy('question_sets.serial', 'asc')
                        ->orderBy('questions.serial', 'asc')
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
                    ->editColumn('required', function($data) {
                        if($data->required == 1){
                            return "<span class='btn btn-sm btn-danger rounded' style='padding: .1rem .5rem !important;'>Reuired</span>";
                        }
                    })
                    ->editColumn('type', function($data) {
                        if($data->type == 1){
                            return "<span class='btn btn-sm btn-info rounded' style='padding: .1rem .5rem !important;'>Open Ended</span>";
                        }else{
                            return "<span class='btn btn-sm btn-info rounded' style='padding: .1rem .5rem !important;'>MCQ</span>";
                        }
                    })
                    ->addColumn('action', function($data){
                        $btn = ' <a href="'.url('edit/question')."/".$data->slug.'" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="mb-1 btn-sm btn-warning rounded editBtn d-inline-block"><i class="bi bi-pencil-square"></i> Edit</a>';
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn-sm btn-danger rounded deleteBtn d-inline-block"><i class="bi bi-trash"></i> Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status', 'type', 'required'])
                    ->make(true);

        }
        return view('backend.question.view');
    }

    public function createQuestion(){
        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('backend.question.create', compact('questionSets'));
    }

    public function saveNewQuestion(Request $request){

        Question::insert([
            'question_set_id' => $request->question_set_id,
            'question' => $request->question,
            'question_bn' => $request->question_bn,
            'hints' => $request->hints,
            'hints_bn' => $request->hints_bn,
            'type' => $request->type,
            'serial' => Question::min('serial')-1,
            'status' => $request->status,
            'required' => $request->required,
            'slug' => time().str::random(5),
            'created_at' => Carbon::now()
        ]);

        Toastr::success('Question Saved Successfully', 'Success');
        return redirect('view/all/questions');
    }

    public function editQuestion($slug){
        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        $question = Question::where('slug', $slug)->first();
        return view('backend.question.updated', compact('questionSets', 'question'));
    }

    public function updateQuestionInfo(Request $request){
        Question::where('id', $request->question_id)->update([
            'question_set_id' => $request->question_set_id,
            'question' => $request->question,
            'question_bn' => $request->question_bn,
            'hints' => $request->hints,
            'hints_bn' => $request->hints_bn,
            'type' => $request->type,
            'serial' => Question::min('serial')-1,
            'status' => $request->status,
            'required' => $request->required,
            'updated_at' => Carbon::now()
        ]);

        Toastr::success('Question Updated Successfully', 'Success');
        return redirect('view/all/questions');
    }

    public function getQuestionInfo($id){
        $data = Question::where('id', $id)->first();
        return response()->json($data);
    }

    public function rearrangeQuestions(){
        $questionSets = QuestionSet::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('backend.question.rearrange', compact('questionSets'));
    }

    public function saveRearrangedQuestions(Request $request){
        $sl = 1;
        foreach($request->id as $id){
            Question::where('id', $id)->update([
                'serial' => $sl
            ]);
            $sl++;
        }
        Toastr::success('Item has been Rerranged', 'Success');
        return redirect('view/all/questions');
    }

}
