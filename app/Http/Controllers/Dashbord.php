<?php

namespace App\Http\Controllers;
use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;

class Dashbord extends Controller
{   
    public function index(){
        $stack = Sotuv_Royxati::all();
        $count = count($stack);
        
        // dd($count);
        return view('admin.indexMain',compact('count'));
    }
}
