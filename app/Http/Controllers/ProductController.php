<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\taminotchi;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $product = Product::all();
        return view('product.index' ,compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $taminot = taminotchi::all();
        $cate = Category::all();
        return view('product.create',compact('cate','taminot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $validate = $request->validate([
        //         'name'=>'string|min:3|max:255',
        //         'price'=>'numeric',
        //         'shop_price'=>'numeric',
        //         'count'=>'numeric',
        //         'image'=>'mimes:jpg,jpeg,png|size:85000000',
        //         'desc'=>'nullable|max:100',
        // ]);
        $uploaded = $request->file('image');
        if($uploaded){
            $uploaded = $request->file('image');
            if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            
            $new_name = rand(100,999).time().'image.'.$tmp_name;
            //dd($new_name);
    
                
            $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
            //dd($move);
    
            $baza_name = "images/uploaded-image/".$new_name;
            //dd($baza_name);
            if($move){
                $store = Product::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    'desc'=>$request->desc,
                    'image'=>$baza_name,
                    'producttime'=>$request->producttime,
                    'taminotchi'=>$request->taminotchi,
                    'price'=>$request->price,
                    'shop_price'=>$request->shop_price,
                    'count'=>$request->count
                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return redirect()->back();
                }
            }
        }}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cate = Category::all();
        $product = Product::find($id);
        return view('product.edit',compact('product','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Product::find($id);
        $uploaded = $request->file('image');
        if($uploaded){
            $uploaded = $request->file('image');
            if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            
            $new_name = rand(100,999).time().'image.'.$tmp_name;
            //dd($new_name);
    
                
            $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
            //dd($move);
    
            $baza_name = "images/uploaded-image/".$new_name;
            //dd($baza_name);
            if($move){
                $store = $prod->update([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    'desc'=>$request->desc,
                    'image'=>$baza_name,
                    'producttime'=>$request->producttime,
                    'price'=>$request->price,
                    'shop_price'=>$request->shop_price,
                    'count'=>$request->count
                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return redirect()->back();
                }
            }
    }}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $delete = Product::find($id);
        $image = $delete->image;
        if($image){
            unlink(public_path($image));
            $del = $delete->delete();
            if($del){
            return redirect()->back();
            }
        }else{
            $del = $delete->delete();
            if($del){
            return redirect()->back();
            }
        }
        
    }
}