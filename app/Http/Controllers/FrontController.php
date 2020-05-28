<?php

namespace App\Http\Controllers;

use App\Mart;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $marts = Mart::all();
        return view('front.index',compact('marts'));
    }
}
