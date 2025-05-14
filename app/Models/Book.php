<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasUuids;

    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'title',
        'genre_id',
        'author_id',
        'rating',
        'copies_available',
        'description'
    ];
}
