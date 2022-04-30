@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between align-center my-2">
    <h1 class="w-100">Qarz sahifasi</h1>
    <a href="{{ route('shaxsiyqarz.create') }}" class="btn btn-success">Yaratish</a>
</div>
<table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Taminotchi</th>
                <th>Summa</th>
                <th>Malumoti</th>
                <th scope="col" style="width:10% !important">Amallar</th>
            </tr>
        </thead>
        <tbody>
@forelse($qarz as $qarz)
                <tr>
                    <td scope="row">{{ $qarz->id }}</th>
                    <td>{{ \App\Models\taminotchi::find($qarz->taminotchi_id)->name }}</td>
                    <td>{{ $qarz->summa }}</td>
                    <td>{{ $qarz->desc }}</td>
                    <td  class="d-flex align-center justify-content-around align-center">
                        <a href="{{ route('shaxsiyqarz.edit',$qarz->id) }}" class="mt-2 btn btn-primary mx-1">To'lash</a>
                        <form action="{{ route('shaxsiyqarz.destroy',$qarz->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-2 mx-1"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                    <div class="d-flex justify-content-between align-center">
                        <h1>Hozircha qarzlar mavjud emas!</h1>
                    </div>
                @endforelse
            </tbody>
        </table>
@endsection