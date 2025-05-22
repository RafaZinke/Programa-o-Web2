<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Criar usuário administrador
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@bookreads.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Criar usuários comuns
        $users = User::factory(10)->create();

        // Criar livros de exemplo
        $books = [
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'description' => 'Romance clássico da literatura brasileira que narra a história de Bentinho e sua obsessão por Capitu.',
                'genre' => 'Romance',
                'publication_date' => '1899-12-01',
                'isbn' => '978-8525406262',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Distopia sobre um regime totalitário que controla todos os aspectos da vida humana.',
                'genre' => 'Ficção Científica',
                'publication_date' => '1949-06-08',
                'isbn' => '978-0451524935',
            ],
            [
                'title' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Épica fantasia sobre a jornada para destruir o Um Anel e salvar a Terra-média.',
                'genre' => 'Fantasia',
                'publication_date' => '1954-07-29',
                'isbn' => '978-0544003415',
            ],
            [
                'title' => 'Cem Anos de Solidão',
                'author' => 'Gabriel García Márquez',
                'description' => 'Obra-prima do realismo mágico que conta a saga da família Buendía.',
                'genre' => 'Ficção',
                'publication_date' => '1967-06-05',
                'isbn' => '978-0060883287',
            ],
            [
                'title' => 'O Código Da Vinci',
                'author' => 'Dan Brown',
                'description' => 'Thriller que mistura arte, história e mistério em uma trama envolvente.',
                'genre' => 'Mistério',
                'publication_date' => '2003-03-18',
                'isbn' => '978-0307474278',
            ],
        ];

        foreach ($books as $bookData) {
            $book = Book::create($bookData);
            
            // Criar avaliações aleatórias para cada livro
            $randomUsers = $users->random(rand(3, 8));
            foreach ($randomUsers as $user) {
                Review::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'rating' => rand(3, 5),
                    'comment' => fake()->optional(0.7)->paragraph(),
                ]);
            }
        }

        // Atualizar médias de avaliação
        Book::all()->each->updateAverageRating();
    }
}