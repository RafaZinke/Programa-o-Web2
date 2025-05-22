<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 mb-3">Descubra Seu Próximo Livro Favorito</h1>
        <p class="lead">Explore, avalie e compartilhe suas leituras</p>
    </div>
</div>

<div class="container py-4">
    <!-- Filtros e Busca -->
    <div class="row mb-4">
        <div class="col-12">
            <form method="GET" action="{{ route('books.index') }}" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Buscar por título, autor..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="genre" class="form-select">
                        <option value="">Todos os gêneros</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                            {{ $genre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort" class="form-select">
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Título</option>
                        <option value="author" {{ request('sort') == 'author' ? 'selected' : '' }}>Autor</option>
                        <option value="average_rating" {{ request('sort') == 'average_rating' ? 'selected' : '' }}>Avaliação</option>
                        <option value="publication_date" {{ request('sort') == 'publication_date' ? 'selected' : '' }}>Data de Publicação</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista de Livros -->
    @if($books->count() > 0)
    <div class="row">
        @foreach($books as $book)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100 card-hover border-0 shadow-sm">
                @if($book->cover_image)
                <img src="{{ Storage::url($book->cover_image) }}" class="book-cover" alt="{{ $book->title }}">
                @else
                <div class="book-cover bg-light d-flex align-items-center justify-content-center">
                    <i class="fas fa-book fa-3x text-muted"></i>
                </div>
                @endif
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ Str::limit($book->title, 30) }}</h5>
                    <p class="text-muted mb-2">{{ $book->author }}</p>
                    <p class="small text-muted mb-2">{{ $book->genre }}</p>
                    
                    <div class="mb-2">
                        @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $book->average_rating ? 'rating-stars' : 'text-muted' }}"></i>
                        @endfor
                        <span class="ms-1 small text-muted">({{ $book->total_reviews }})</span>
                    </div>
                    
                    <div class="mt-auto">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary btn-sm w-100">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center">
        {{ $books->appends(request()->query())->links() }}
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h4>Nenhum livro encontrado</h4>
        <p class="text-muted">Tente ajustar seus filtros de busca</p>
    </div>
    @endif
</div>
#### View: Formulário de Criação/Edição de Livros

```php
<!-- resources/views/books/create.blade.php -->

