<?php
// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Busca por termo
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filtro por gênero
        if ($request->filled('genre')) {
            $query->byGenre($request->genre);
        }

        // Ordenação
        $sortBy = $request->get('sort', 'title');
        $sortOrder = $request->get('order', 'asc');
        
        $query->orderBy($sortBy, $sortOrder);

        $books = $query->paginate(12);
        $genres = Book::distinct()->pluck('genre')->sort();

        return view('books.index', compact('books', 'genres'));
    }

    public function show(Book $book)
    {
        $book->load(['reviews.user']);
        $userReview = null;
        
        if (auth()->check()) {
            $userReview = $book->reviews()->where('user_id', auth()->id())->first();
        }

        return view('books.show', compact('book', 'userReview'));
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:100',
            'publication_date' => 'required|date',
            'isbn' => 'nullable|string|unique:books',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livro criado com sucesso!');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:100',
            'publication_date' => 'required|date',
            'isbn' => 'nullable|string|unique:books,isbn,' . $book->id,
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            // Deletar imagem antiga
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('books.show', $book)
            ->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livro excluído com sucesso!');
    }
}