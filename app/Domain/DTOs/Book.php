<?php 

namespace App\Domain\DTOs;

class Book {
    private string $id;
    private string $title;
    private string $description;
    private string $authorId;
    private string $genreId;
    private int $rating;
    private int $copiesAvailable;

    public function __construct(
        string $id,
        string $title,
        string $description,
        string $authorId,
        string $genreId,
        int $rating,
        int $copiesAvailable
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->authorId = $authorId;
        $this->genreId = $genreId;
        $this->rating = $rating;
        $this->copiesAvailable = $copiesAvailable;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getAuthorId(): string {
        return $this->authorId;
    }

    public function getGenreId(): string {
        return $this->genreId;
    }

    public function getRating(): int {
        return $this->rating;
    }

    public function getCopiesAvailable(): int {
        return $this->copiesAvailable;
    }

    public function toArray(): array {
        return [
            'book_id' => $this->id,
            'title' => $this->title,
            'description'=> $this->description,
            'author_id' => $this->authorId,
            'genre_id' => $this->genreId,
            'rating' => $this->rating,
            'copies_available' => $this->copiesAvailable
        ];
    }

    public static function fromArray(array $data): self {
        return new self (
            $data['book_id'] ?? '',
            $data['title'],
            $data['description'] ?? '',
            $data['author_id'],
            $data['genre_id'] ?? '',
            $data['rating'] ?? -1,
            $data['copies_available'] ?? 0
        );
    }
}