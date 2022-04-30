@extends('admin.index')

@section('content')

<form action="{{ route('searchombor') }}" method="POST" class="form-control w-100" >
        @csrf
        @method('POST')
        <select name="category_id" id="" class="form-select m-2" style="width:99%">
            <option value="">Kategoriyani tanlang</option>
            @forelse($cate as $cate)
                <option value="{{$cate->id}}">{{ $cate->name }}</option>
                @empty
                <optgroup>Category yoq</optgroup>
            @endforelse
        </select>
        <button class="btn btn-success mx-2" >Tanlang</button>
    </form> 
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th>Rasm</th>
                    <th>Narxi</th>
                    <th scope="col">ID raqami</th>
                    <th>Taminotchi</th>
                    <th>Mavjud</th>
                </tr>
            </thead>
            <tbody>
                @forelse($product as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->name }}</td>
                        <td> <image src="{{ $prod->image }}" style="width:120px;height:80px"></image> </td>
                        <td>{{ $prod->price }}</td>
                        <td>{{ $prod->producttime }}</td>
                        <td>{{$prod->taminotchi  }}</td>
                        <td>{{ $prod->count }}</td>
                    </tr>
                @empty
                    <h4>Hozircha Kategoriya tanlanmagan yoki kategoriyada tavar mavjud emas</h4>
                @endforelse
            </tbody>
        </table>

@endsection