@extends('admin.index')

@section('content')

    <h1>Tavarni tahrirlash</h1>
    <form action="{{ route('product.update',$product->id) }}" method="post" class="form-control d-flex flex-column " enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input value="{{ $product->name }}" type="text" name="name" class="input-control m-2 p-2" placeholder="Tavar nomini kiriting:" required>
        <select name="category_id" id="" class="form-select m-2" style="width:99%" required>
            <option value="">Kategoriyani tanlang</option>
            @foreach($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
            @endforeach
        </select>
        <div class="m-2">
            <label for="formFile" class="form-label">Tavar rasmini yuklash</label>
            <input value="{{ $product->image }}" class="form-control" type="file" id="formFile" name="image" required>
        </div>
        <input value="{{ $product->price }}" type="number" name="price" class="input-control m-2 p-2" placeholder="Tavar narxini kiriting:" required>
        <input value="{{ $product->shop_price }}" type="number" name="shop_price" class="input-control m-2 p-2" placeholder="Tavarning sotilish narxini kiriting:" required>
        
        <?php
        $time = time();
        echo '<input  value='.$time.' type="hidden" name="producttime" class="input-control m-2 p-2" placeholder="Tavar uchun id raqam">' ;
        echo '<h4 class="m-2">Tavar ID raqami '.$time.'</h4>';
        ?>
        <textarea name="desc" id="" cols="30" rows="10" class="input-control m-2 p-2">{{ $product->desc }}</textarea>
        <input value="{{ $product->count }}" type="number" name="count" id="" class="input-control m-2 p-2" placeholder="Tavar miqdori:" required>
        <button class="btn btn-primary m-2">Yaratish</button>
    </form>
@endsection