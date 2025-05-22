<?php
// app/Http/Controllers/ReviewController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Book $book)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['book_id'] = $book->id;

        // Verificar se já existe review do usuário para este livro
        $existingReview = Review::where('user_id', auth()->id())
                               ->where('book_id', $book->id)
                               ->first();

        if ($existingReview) {
            $existingReview->update($validated);
            $message = 'Sua avaliação foi atualizada!';
        } else {
            Review::create($validated);
            $message = 'Avaliação criada com sucesso!';
        }

        return redirect()->route('books.show', $book)
            ->with('success', $message);
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        
        $book = $review->book;
        $review->delete();

        return redirect()->route('books.show', $book)
            ->with('success', 'Avaliação removida com sucesso!');
    }
}