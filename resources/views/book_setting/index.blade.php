@extends('layouts.app')

@section('content')
<div class="container">
@if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
    <div class="text-end my-2">
        <a href="{{url('books-create')}}" class="btn btn-sm btn-success">Add Books</a>
    </div>
    <table class="table">
        <thead>
            <th>
                Book Name
            </th>
            <th>
                Cover
            </th>
            <th>
                Author
            </th>
            <th>
                Release Date
            </th>
            <th>
                Action
            </th>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>
                    {{$row->book_name}}
                </td>
                <td>
                    <img src="{{asset('storage/images/book/'. $row->cover )}}" class="img-thumbnail" style="max-height: 200px;" alt="">
                </td>
                <td>
                    {{$row->author}}
                </td>
                <td>
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $row->release_date)->format('l, F jS, Y') }}
                </td>
                <td class="d-flex justify-content-around">
                    <a href="{{url('edit-book', $row->id)}}" class="btn btn-sm btn-warning text-white">Edit</a>
                    <form action="{{url('/delete-book',$row->id )}}" method="post">
                        @csrf
                        {{method_field('delete')}}
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection