<?php
// app/Policies/BookPolicy.php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    public function create(User $user)
    {
        return $user->is_admin ?? false;
    }

    public function update(User $user, Book $book)
    {
        return $user->is_admin ?? false;
    }

    public function delete(User $user, Book $book)
    {
        return $user->is_admin ?? false;
    }
}