<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $book = Book::Select("*")
        ->orderBy("id", "asc")
        ->get();
        return view('home', compact('book'));
        return response()->json($book);

        // return view('home');
    }


    public function tambahpinjam($id)
    {
        $book = Book::where('id', $id)->get();
        // return response()->json($book);

        return view('tambahpinjam', compact('book'));

    }


}
