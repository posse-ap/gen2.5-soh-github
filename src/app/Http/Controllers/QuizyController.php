<?php

namespace App\Http\Controllers;

use App\Models\BigQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizyController extends Controller
{
  public function index($id) {
    $items = BigQuestion::where('id', $id)->with('questions.choices')->get();

    $param = ['prefecture' => $items];
    return view('quizy.index', $param);
  }

  public function quizlist() {
    $items = BigQuestion::all();
    return view('quizy.quizytop', compact('items'));
  }
}
