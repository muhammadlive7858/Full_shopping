<?php

namespace App\Http\Controllers;

use App\Models\ShaxsiyQarz;
use App\Models\taminotchi;
use Illuminate\Http\Request;

class ShaxsiyQarzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $taminotchi = taminotchi::all();
        $qarz = ShaxsiyQarz::all();
        return view('shaxsiyqarz.index',compact('qarz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taminotchi = taminotchi::all();
        return view('shaxsiyqarz.create',compact('taminotchi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = ShaxsiyQarz::create($request->input());
        if($store){
            return redirect()->route('shaxsiyqarz.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function show(ShaxsiyQarz $shaxsiyQarz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qarz = ShaxsiyQarz::find($id);
        return view('shaxsiyqarz.edit',compact('qarz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $qarz = ShaxsiyQarz::find($id);
        $tolav = $qarz->summa - $request->tolav;
        $update = $qarz->update([
            'summa'=>$tolav,
        ]);
        if($update){
            return redirect()->route('shaxsiyqarz.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShaxsiyQarz  $shaxsiyQarz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qarz = ShaxsiyQarz::find($id);
        $delete = $qarz->delete();
        if($delete){
            return redirect()->back();
        }
    }
}
