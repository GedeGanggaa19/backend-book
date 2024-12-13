<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'author_id', 'average_rating', 'voter'];

    /**
     * Relasi ke tabel category.
     * Satu buku dimiliki oleh satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke tabel author.
     * Satu buku ditulis oleh satu penulis.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Relasi ke tabel ratings.
     * Satu buku memiliki banyak rating.
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
