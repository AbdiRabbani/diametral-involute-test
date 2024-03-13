<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BooksController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Books::all();
        return view('book_setting.index', compact('data'));
    }

    public function create()
    {
        return view('book_setting.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data_all = [
            'book_name' => $data['book_name'],
            'cover' => $data['cover'],
            'author' => $data['author'],
            'release_date' => $data['release_date'],
            'description' => $data['description'],
        ];

            $destination_path = 'public/images/book'; 
            $cover = $request -> file('cover');
            $cover_name = $cover->getClientOriginalName(); 
            $path = $request->file('cover')->storeAs($destination_path, $cover_name); 
            $data_all['cover'] = $cover_name;



        Books::create($data_all);
        return redirect('books')->with('success', 'Success add Book');
    }

    public function edit($id)
    {
        $data = Books::find($id);

        return view('book_setting.edit', compact('data'));
    }

    public function show($id)
    {
        $data = Books::find($id);

        return view('book_setting.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($request->cover) {
            $data_all = [
                'book_name' => $data['book_name'],
                'cover' => $data['cover'],
                'author' => $data['author'],
                'release_date' => $data['release_date'],
                'description' => $data['description'],
            ];
    
                $destination_path = 'public/images/book'; 
                $cover = $request -> file('cover');
                $cover_name = $cover->getClientOriginalName(); 
                $path = $request->file('cover')->storeAs($destination_path, $cover_name); 
                $data_all['cover'] = $cover_name;
        } else {
            $data_all = [
                'book_name' => $data['book_name'],
                'author' => $data['author'],
                'release_date' => $data['release_date'],
                'description' => $data['description'],
            ];
        }

        Books::findOrFail($id)->update($data_all);

        return redirect('books')->with('success', 'Success save book');
        
    }

    public function destroy($id)
    {
        Books::find($id)->delete();

        return back()->with('success', 'Success delete book');
    }
}
