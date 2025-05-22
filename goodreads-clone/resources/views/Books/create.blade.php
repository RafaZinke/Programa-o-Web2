@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus me-2"></i>Adicionar Novo Livro
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Título *</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label">Autor *</label>
                                <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" 
                                       value="{{ old('author') }}" required>
                                @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="genre" class="form-label">Gênero *</label>
                                <select name="genre" id="genre" class="form-select @error('genre') is-invalid @enderror" required>
                                    <option value="">Selecione um gênero</option>
                                    <option value="Ficção" {{ old('genre') == 'Ficção' ? 'selected' : '' }}>Ficção</option>
                                    <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Mistério" {{ old('genre') == 'Mistério' ? 'selected' : '' }}>Mistério</option>
                                    <option value="Fantasia" {{ old('genre') == 'Fantasia' ? 'selected' : '' }}>Fantasia</option>
                                    <option value="Ficção Científica" {{ old('genre') == 'Ficção Científica' ? 'selected' : '' }}>Ficção Científica</option>
                                    <option value="Biografia" {{ old('genre') == 'Biografia' ? 'selected' : '' }}>Biografia</option>
                                    <option value="História" {{ old('genre') == 'História' ? 'selected' : '' }}>História</option>
                                    <option value="Autoajuda" {{ old('genre') == 'Autoajuda' ? 'selected' : '' }}>Autoajuda</option>
                                    <option value="Tecnologia" {{ old('genre') == 'Tecnologia' ? 'selected' : '' }}>Tecnologia</option>
                                    <option value="Outro" {{ old('genre') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                </select>
                                @error('genre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="publication_date" class="form-label">Data de Publicação *</label>
                                <input type="date" name="publication_date" id="publication_date" 
                                       class="form-control @error('publication_date') is-invalid @enderror" 
                                       value="{{ old('publication_date') }}" required>
                                @error('publication_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control @error('isbn') is-invalid @enderror" 
                                   value="{{ old('isbn') }}" placeholder="978-0000000000">
                            @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Capa do Livro</label>
                            <input type="file" name="cover_image" id="cover_image" 
                                   class="form-control @error('cover_image') is-invalid @enderror" 
                                   accept="image/*">
                            <div class="form-text">Formatos aceitos: JPEG, PNG, JPG. Tamanho máximo: 2MB</div>
                            @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" 
                                      rows="4" placeholder="Descreva o livro...">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Voltar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Salvar Livro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection