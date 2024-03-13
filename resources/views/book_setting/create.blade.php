@extends('layouts.app')

@section('content')
<div class="container bg-white rounded p-3">
    <form action="{{url('book-save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Book Name</label>
            <input required type="text" name="book_name" class="form-control">
        </div>
        <div>
            <label for="">Book Cover</label>
            <input required type="file" name="cover" class="form-control">
        </div>
        <div>
            <label for="">Author</label>
            <input required type="text" name="author" class="form-control">
        </div>
        <div>
            <label for="">Release Date</label>
            <input required type="date" name="release_date" class="form-control">
        </div>
        <div>
            <label for="">Description</label>
            <textarea required name="description" id="" class="form-control"></textarea>
        </div>
        <div class="text-end my-2">
            <button class="btn btn-sm btn-success">Add</button>
        </div>
    </form>
</div>
@endsection
