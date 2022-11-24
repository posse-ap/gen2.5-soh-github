<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizyController extends Controller
{
  public function index($id=0) {
    if ($id==1) {
      $data = ['prefecture' => '東京'];
    }else{
      $data = ['prefecture' => '広島'];
    }
    return view('quizy.index', $data);
  }
}
