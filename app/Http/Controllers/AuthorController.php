<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function topFamous()
    {
        $authors = Author::where('voter', '>', 5)
            ->orderBy('voter', 'desc')
            ->take(10)
            ->get(['name', 'voter']);

        return view('author.topFamous', compact('authors'));
    }

}
