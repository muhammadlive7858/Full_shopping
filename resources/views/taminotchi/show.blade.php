@extends('admin.index')

@section('content')
<h1 class="w-100">Taminotchi tamonidan kiritilgan tavarlar:</h1>
    <table class="table table-bordered w-100 table-responsive">
            <thead>
                <tr class="">
                    <th  class="seconds" scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th  class="seconds" scope="col">ID raqami</th>
                    <th  class="seconds" scope="col">Taminotchi</th>
                    <th>Mavjud</th>
                </tr>
            </thead>
            <tbody>
            @forelse($prod as $prod)
                <tr>
                    <td  class="seconds" scope="row">{{ $prod->id }}</th>
                    <td>{{ $prod->name }}</td>
                    <td class="seconds">{{ $prod->producttime }}</td>
                    <td class="seconds">
                        {{\App\Models\taminotchi::find($prod->taminotchi)->name}}
                    </td>
                    <td>{{ $prod->count }}</td>
                </tr>
                @empty
                <h4>Tavar mavjud emas</h4>
                @endforelse
            </tbody>
        </table>
@endsection