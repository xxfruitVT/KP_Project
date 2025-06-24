<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
{
    $books = Book::all();
    return view('tabs.eperpus', compact('books'));
}

public function show($id)
{
    $book = Book::findOrFail($id);
    return view('tabs.eperpus-detail', compact('book'));
}



}
