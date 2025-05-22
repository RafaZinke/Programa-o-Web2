<?php
// app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment'
    ];

    // Relacionamento: Uma avaliação pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento: Uma avaliação pertence a um livro
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Event para atualizar média do livro após criar/atualizar review
    protected static function booted()
    {
        static::created(function ($review) {
            $review->book->updateAverageRating();
        });

        static::updated(function ($review) {
            $review->book->updateAverageRating();
        });

        static::deleted(function ($review) {
            $review->book->updateAverageRating();
        });
    }
}