<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizyController extends Controller
{
  public function index($id) {
    $items = Models\BigQuestion::where('id', $id)->with('questions.choices')->get();
    // dd($items);

    $param = ['prefecture' => $items];
    return view('quizy.index', $param);
  }
}
