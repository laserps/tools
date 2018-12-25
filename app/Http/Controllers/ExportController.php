<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class ExportController extends Controller
{
    public function trellotoexcel(){
        return view('trellotoexcel.form');
    }
    public function ajaxGetData(Request $request){
        return $request->all();
    }
}
