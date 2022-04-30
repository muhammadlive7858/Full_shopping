<?php
use App\Models\Product;

namespace App\Http\Controllers;

use App\Models\Asosiy_sotuvlar;
use App\Models\Category;
use App\Models\Product;


use App\Models\Search;

use App\Models\Sotuv_Royxati;
use App\Models\vaqtincha;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SotuvOfisi extends Controller
{   
    // public array = [];
    public function index(){
        $cate = Category::all();
        $product = Product::all();
        return view('shop.index',compact('cate','product'));
    }

    public function productsearch(Request $request){
        $name = $request->productsearch;
        if (trim($name)) {
            $productname = DB::table('products')->where('name', 'like', '%' . $name . '%')->where('count', '>', 0)->get();

            $prod_vaqt = vaqtincha::all();
            $client = [];
            return view('shop.create', compact('productname', 'prod_vaqt', 'client'));
        } else {
            return redirect()->back();
        }
    }

    public function create_vaqtincha(Request $request){
        $prod = intval($request->productid);
        $prod = Product::all()->where('id',$prod)->first();
        $store = vaqtincha::create([
            'product_id'=>$prod->id,
            'product_name'=>$prod->name,
            'product_count'=>$prod->count,
            'price'=>$prod->shop_price
        ]);
        if($store){
            $prod_vaqt = vaqtincha::all();
            $client = [];
            return view('shop.create', compact('prod_vaqt', 'client'));
            // return view('shop.create',compact('prod_vaqt','client'));
        }else{
            return redirect()->back();
        }
    }
    public function productid(Request $request){
        $validate = $request->validate([
            'producttime'=>'numeric',
        ]);
        $cate = Category::all();
        $product = Product::all()->where('producttime',$request->input('productid'));
        
        

        // dd($product);
        // return view('shop.create',compact('product','cate'));
        foreach($product as $product){
            $vaqt = vaqtincha::create([
                    'product_id'=>$product['id'],
                    'product_name'=>$product['name'],
                    'product_count'=>$product['count'],
                    'price'=>$product['shop_price'],
            ]);
        }
        $prod_vaqt = vaqtincha::all();
        // dd($product);
        return view('shop.create',compact('cate','prod_vaqt'));

    }

    public function hisoblash(Request $request){
        $savdo = 0;
        $price = [];
        $i = 0;
        $product_mossiv = $request->product;
        $sotish_soni_mossiv = $request->sotish_soni;
        foreach($request->product as $prod){
            $product = Product::all()->where('id',intval($prod))->first();
            $price[$i] =  $product->shop_price;
            $i++;
        }
        $i = 0;
        foreach($request->sotish_soni as $son){
            $savdo = $savdo + ($price[$i] * $son);
            $i++;
        }
        $prod_vaqt = vaqtincha::all();
        $client = [];
        // dd($savdo);
        return view('shop.create',compact('prod_vaqt','client','product_mossiv','sotish_soni_mossiv','savdo'));
    }

    public function fullHisob(Request $request){
        // request = skidka , product[], count [],client,plastik,savdo
        $i = 0;
        $name = [];
        $foyda = [];
        $savdo = 0;
        $fullFoyda = 0;
        $product_mossiv = [];
        $original_count = [];
        foreach($request->product as $prod){
            $prod = intval($prod);
            $product = Product::all()->where('id',$prod)->first();
            // dd($product->count);
            $original_count[$i] = $product->count;
            $product_mossiv[$i] = $product;
            $name[$i] = $product->name;
            $foyda[$i] = $product->shop_price - $product->price;
            $i++;
        }
        $i = 0;
        $count = [];
        $fullName = [];
        foreach($request->count as $count){
            $count[$i] = $count;
            $fullFoyda = $fullFoyda + (floatval($count) * floatval($foyda[$i]));
            // dd($fullFoyda);
            $fullName[$i] = $name[$i]." --> ".$count;
            $product_mossiv[$i]->update(['count'=>$original_count[$i] - $count]);
            $i++;
        }
        $fullName = json_encode($fullName);
        $store = Asosiy_sotuvlar::create([
            'fullname'=>$fullName,
            'savdo'=>$request->savdo,
            'foyda'=>$fullFoyda,
            'skidka'=>$request->skidka,
            'naxt'=>$request->savdo - $request->plastik,
            'plastik'=>$request->plastik,
            'client_id'=>$request->client_id
        ]);
        if($store){
            $vaqt = vaqtincha::get();
            foreach($vaqt as $vaqt){
                $delete = $vaqt->delete();
            }

            return redirect()->route('shop-index');
        }else{
            return redirect()->back();
        }

    }




    public function sotish(Request $request){
        $i = 0;
        foreach($request->prod_id as $prod_id){
            $s = intval($prod_id);
            // dd($s);
            // $pro = Product::where('id', $s )->get();
            $pro = Product::find($s);
            $update = $pro->update([
                'count' => $pro->count - intval($request->sotish_soni[$i])
            ]);

            $i++;

        }
        // dd($request->prod_id);
        $i = 0;
        foreach($request->prod_id as $prod){
            $product = Product::all()->where('id',intval($prod))->first();
            // dd($product);
            $name[$i] = $product->name;
            $f[$i] = intval($product->shop_price) - $product->price;
            $i++;
        }
        $i = 0;
        foreach($request->sotish_soni as $sotish){
            // $sotish = $request->sotish_soni;
            // dd($request->skidka);
            $count = $sotish;
            $foyda = $f[$i] * intval($sotish);
            $skidka = intval($request->skidka) / count($request->sotish_soni);
            $royxat = Sotuv_Royxati::create([
                'product_name' => $name[$i],
                'count'=>$count,
                'foyda'=>$foyda,
                'skidka'=>$skidka,
                'tolav_turi'=>$request->tolav_turi,
            ]);
            $i++;
        }
        

        if($update){
            $vaqt = vaqtincha::get();
            foreach($vaqt as $vaqt){
                $delete = $vaqt->delete();
            }
            if($delete){
                return redirect()->route('shop-index');
                $s = 10;
            }
            else{
                return redirect()->back();

            }
        }
    }

    public function tozalash(){

        $vaqt = vaqtincha::get();
        foreach($vaqt as $vaqt){
            $delete = $vaqt->delete();
        }
        if(true){
            return redirect()->route('shop-index');
        }
        else{
            return redirect()->back();
        }
    }
}
    