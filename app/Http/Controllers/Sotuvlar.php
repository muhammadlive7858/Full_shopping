<?php

namespace App\Http\Controllers;

use App\Models\Asosiy_sotuvlar;
use App\Models\Sotuv_Royxati;
use Illuminate\Http\Request;

class Sotuvlar extends Controller
{
    public function index(){
        $sotuv = Asosiy_sotuvlar::all();
        return view('sotuvlar.index',compact('sotuv'));
    }
    public function edit($id){
        $sotuv = Asosiy_sotuvlar::all()->where('id',$id);
        return view('sotuvlar.edit',compact('sotuv'));
    }
    public function update($id,Request $request){
        $edit = Asosiy_sotuvlar::find($id);
        $update = $edit->update($request->input());
        if($update){
            return redirect()->route('sotuvlar');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id){
        $delete = Asosiy_sotuvlar::find($id);
        // dd($delete);
        $delete = $delete->delete();
        return redirect()->back();
    }
}
