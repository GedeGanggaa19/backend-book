<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'rating'];

    /**
     * Relasi ke tabel books.
     * Satu rating dimiliki oleh satu buku.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
