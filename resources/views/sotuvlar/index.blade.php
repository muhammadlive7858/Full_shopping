@extends('admin.index')

@section('content')
<h1 class="w-100">Hamma Sotuvlar sahifasi</h1>
    <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tavar </th>
                    <th>Savdo summasi</th>
                    <th>Foyda</th>
                    <th>Qaytim puli</th>
                    <th>Naxt</th>
                    <th>Plastik</th>
                    <th>Vaqti</th>
                    <th scope="col" style="width:10% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sotuv as $prod)
                <tr>
                    <td scope="row">{{ $prod->id }}</th>
                    <td>
                        {{$prod->fullname}}
                    </td>
                    <td>{{ $prod->savdo }}</td>
                    <td>{{ $prod->foyda }}</td>
                    <td>{{ $prod->skidka }}</td>
                    <td>{{ $prod->naxt }}</td>
                    <td>{{ $prod->plastik }}</td>
                    <td>{{ $prod->created_at }}</td>
                    <td  class="d-flex align-center justify-content-around">
                        <a href="{{ route('sotuvedit',$prod->id) }}" class="mt-2"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'></i></a>
                        <form action="{{ route('sotuvdestroy',$prod->id) }}" method="post" class="d-flex align-center ">
                            @csrf
                            @method('DELETE')
                        <button class="btn-danger w-100 p-1 "style='border-radius:5px' ><i class="bi bi-trash-fill " ></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection