<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index(Request $request)
{
    // Default limit for the number of books shown
    $limit = $request->input('list_shown', 10);
    $search = $request->input('search', null);

    // Query books with relationships and filters
    $booksQuery = Book::with(['category', 'author'])
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        })
        ->orderBy('average_rating', 'desc');

    // Ambil data buku sesuai limit
    $books = $booksQuery->take($limit)->get();

    // Kirim data ke view
    return view('book.listBook', compact('books'));
}

}
