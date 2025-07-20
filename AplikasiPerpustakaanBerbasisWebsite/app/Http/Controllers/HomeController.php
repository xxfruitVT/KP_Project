<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\HistoryBook;
use Illuminate\Http\Request;
use App\Models\Chatbot;

class HomeController extends Controller
{
    public function index()
    {
        $newBooks = Book::latest()
            ->take(4)
            ->get();
        $allBooks = Book::orderBy('created_at', 'desc')
            ->paginate(4);
        $bestBookEntry = HistoryBook::select('book_id', \DB::raw('count(*) as total'))
            ->groupBy('book_id')
            ->orderBy('total', 'desc')
            ->first();

        if ($bestBookEntry) {
            $bestBook = Book::find($bestBookEntry->book_id);
        } else {
            $bestBook = null;
        }
        $genres = Genre::all();
        $books  = Book::all();

        $bestVisitorBooks = HistoryBook::select('book_id', \DB::raw('count(*) as total'))
            ->groupBy('book_id')
            ->orderBy('total', 'desc')
            ->take(4)
            ->get();

        $chatbot = Chatbot::first();
        return view('home.index', compact(
            'newBooks',
            'allBooks',
            'bestBook',
            'genres',
            'books',
            'bestVisitorBooks',
            'chatbot'
        ));
    }
}
