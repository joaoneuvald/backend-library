<?php 

namespace App\Domain\Repositories;

use App\Domain\DTOs\Book;

interface BookRepository {
    public function register(Book $book): Book;
    public function getByTitle(string $title): ?Book;
}