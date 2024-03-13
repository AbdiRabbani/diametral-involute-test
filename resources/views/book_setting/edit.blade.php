@extends('layouts.app')

@section('content')

<div class="container bg-white rounded p-3">
    <form action="{{url('book-update', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div>
            <label for="">Book Name</label>
            <input required type="text" name="book_name" class="form-control" value="{{$data->book_name}}">
        </div>
        <div>
            <label for="">Book Cover</label>
            <div>
            <img src="{{asset('storage/images/book/'. $data->cover )}}" style="max-height:100px;" alt="">
            </div>
            <input type="file" name="cover" class="form-control">
        </div>
        <div>
            <label for="">Author</label>
            <input required type="text" name="author" class="form-control" value="{{$data->author}}">
        </div>
        <div>
            <label for="">Release Date</label>
            <input required type="date" name="release_date" class="form-control" value="{{$data->release_date}}">
        </div>
        <div>
            <label for="">Description</label>
            <textarea required name="description" id="" class="form-control">{{$data->description}}</textarea>
        </div>
        <div class="text-end my-2">
            <button class="btn btn-sm btn-success save-data">Save</button>
        </div>
    </form>
</div>

@endsection