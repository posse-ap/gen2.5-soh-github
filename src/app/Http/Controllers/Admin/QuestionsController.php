<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigQuestion;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $item = BigQuestion::find($id);
        return view('admin/questions/create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $question = new Question;
        $question->big_question_id = $id;
        $question->name = $request->input('question_name');
        $question->save();

        for($i = 0; $i < 3; $i++) {
            $choices = new Choice;
            $choices->question_id = $question->id;
            $choices->name = $request->input('choice' . $i);
            $choices->valid = $request->input('valid' . $i);
            $choices->save();
        }

        return redirect()->route('big_question.show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $question_id)
    {
        $items = Question::with('choices')->find($question_id);

        return view('admin/questions/edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $question_id)
    {
        $items = Question::with('choices')->find($question_id);
        $items->name = $request->input('question_name');
        $items->choices[0]->update(['name' => $request->input('choice1')]);
        $items->choices[1]->update(['name' => $request->input('choice2')]);
        $items->choices[2]->update(['name' => $request->input('choice3')]);
        $items->save();

        return redirect()->route('big_question.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $question_id)
    {
        $item = Question::with('choices')->find($question_id);
        $item->delete();

        return redirect()->route('big_question.show',$id);
    }
}
