<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\HistoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryBookController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $history = HistoryBook::with('book')->where('user_id', Auth::id())->get();
        $genres = Genre::all();

        return view('apps.history.index', compact('history', 'user', 'genres'));
    }
}
