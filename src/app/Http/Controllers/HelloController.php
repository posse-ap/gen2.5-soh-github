<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() {
        $items = Models\BigQuestion::all();

        return view('quizy.quizytop', ['prefecture' => $items]);
    }

    public function post(Request $request){
        return view('hello.index', ['msg' => $request->msg]);
    }
}
