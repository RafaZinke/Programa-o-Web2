<?php
// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'genre',
        'publication_date',
        'isbn',
        'cover_image',
        'average_rating',
        'total_reviews'
    ];

    protected $casts = [
        'publication_date' => 'date',
        'average_rating' => 'decimal:2'
    ];

    // Relacionamento: Um livro tem muitas avaliações
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Método para calcular média das avaliações
    public function updateAverageRating()
    {
        $avg = $this->reviews()->avg('rating') ?? 0;
        $count = $this->reviews()->count();
        
        $this->update([
            'average_rating' => round($avg, 2),
            'total_reviews' => $count
        ]);
    }

    // Scope para busca
    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'ILIKE', "%{$term}%")
                    ->orWhere('author', 'ILIKE', "%{$term}%")
                    ->orWhere('genre', 'ILIKE', "%{$term}%");
    }

    // Scope para filtro por gênero
    public function scopeByGenre($query, $genre)
    {
        return $query->where('genre', $genre);
    }
}