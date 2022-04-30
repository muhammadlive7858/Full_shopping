@extends('admin.index')

@section('content')
<div class="row d-flex align-center justify-content-between">
        @forelse($hodim as $hodim)
        <form class="col-6 form-control" action="{{ route('hodim.savdo') }}" method="POST">
            <h4>Savdo yaratish</h4>
                <select name="hodim" id="" class="form-control" required>
                    <option value="">Hodim tanlash</option>
                    <option value="{{ $hodim->id }}">{{ $hodim->name }}</option>
                </select>
                <textarea  required name="desc" id="" cols="30" rows="10" class="form-control my-2" placeholder="Eslatmalar kiriting:"></textarea>
                <button class="btn btn-primary">Saqlash</button>
                <a href="{{ route('show.savdo') }}" class="btn btn-primary">Savdolar ro'yxati</a>
            </form>
            @empty
        @endforelse
    </div>
    <hr>

@endsection