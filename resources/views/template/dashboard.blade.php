@extends('layouts.app')


@section('content')
<div class="container-fluid mt-4 d-flex justify-content-center flex-wrap gap-5">
        @foreach($data as $row)
        <div class="rounded bg-white shadow p-0 col-md-3" style=" height: 300px; overflow: hidden;">
            <img src="{{asset('storage/images/book/'. $row->cover )}}" class="col-md-12 p-0"
                style="height: 150px; object-fit: cover;" alt="">
            <div class="p-2">
                <p>{{$row->book_name}}
                    ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->release_date)->format('Y') }})</p>
                <p>by {{$row->author}}</p>
            </div>
            <div class="text-end px-3">
                <a href="{{url('book-detail/'. $row->id)}}" class="btn rounded" style="background: #343a40;">
                    <p class="text-white m-0">Detail</p>
                </a>
            </div>
        </div>
        @endforeach
</div>
@endsection
