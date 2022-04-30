<?php

namespace App\Http\Controllers;
use App\Models\Hodimlar;
use App\Models\Hodimsavdo;
use Illuminate\Http\Request;

class Hodims extends Controller
{
    public function index(){
        $hodim = Hodimlar::all();
        return view('hodim.index',compact('hodim'));
    }
    public function create(){
        return view('hodim.create');
    }
    public function store(Request $request){
        $store = Hodimlar::create($request->input());
        if($store){
            return redirect()->route('hodim.index');
        }else{
            return redirect()->back();
        }
    }
    public function edit($id){
        $hodim = Hodimlar::find($id);
        return view('hodim.edit',compact('hodim'));
    }
    public function update(Request $request,$id){
        $hodim = Hodimlar::find($id);
        $update = $hodim->update($request->input());
        if($update){
            return redirect()->route('hodim.index');
        }else{
            return redirect()->back();
        }
    }
    public function destroy($id ){
        $hodim = Hodimlar::find($id);
        $delete = $hodim->delete();
        return redirect()->back();
    }
    public function show(){
        $hodim = Hodimlar::all();
        $savdo = Hodimsavdo::all();
        return view('hodim.show',compact('hodim','savdo'));
    }
    public function savdo(Request $request){
        Hodimsavdo::create($request->input());
        return redirect()->route('show.savdo');
    }
    public function savdodelete($id){
        $delete = Hodimsavdo::find($id);
        $delete = $delete->delete();
        return redirect()->back();
    }
    public function showsavdo(){
        $savdo = Hodimsavdo::all();
        return view('hodim.savdo',compact('savdo'));
    }
}
