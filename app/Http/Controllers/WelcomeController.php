<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
      public function index()
    {
        $book = Book::Select("*")
        ->orderBy("id", "asc")
        ->limit(3)
        ->get();
        return view('welcome', compact('book'));
        return response()->json($book);

        // return view('home');
    }
}
