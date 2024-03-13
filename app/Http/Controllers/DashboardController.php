<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class DashboardController extends Controller
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
        return view('template.dashboard', compact('data'));
    }
}
