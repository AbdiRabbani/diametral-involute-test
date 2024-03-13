@extends('layouts.app')

@section('content')
<style>
    .header-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        object-position: center;
    }

    .logo-img {
        height: 100%;
        max-height: 200px;
        object-fit: cover;
        object-position: center;
    }

    .title-content {
        margin-top: -100px;
        width: 100%;
        min-height: 200px;
    }
</style>

<img class="header-img" src="{{asset('storage/images/book/'.$data->cover)}}"/>
<div class="d-flex row">
    <div class="title-content d-flex flex-wrap px-5">
        <img class="logo-img col-md-2 img-thumbnail" src="{{asset('storage/images/book/'.$data->cover)}}"/>
        <div class="col-md-10">
            <div style="height: 100px;"></div>
            <div>
                <p class="fs-3">{{$data->book_name}}</p>
                <p class="fs-5">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->release_date)->format('l, F jS, Y') }}</p>
            </div>
        </div>
    </div>
    
    <div class="px-5 mt-5">
        <p class="fw-semibold fs-6">Created by : {{$data->author}}</p>
        <p class="fw-semibold fs-5">Description</p>
        <p>{{$data->description}}</p>
    </div>
</div>

@endsection
