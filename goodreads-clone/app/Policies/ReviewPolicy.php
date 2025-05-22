<?php
// app/Policies/ReviewPolicy.php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id || ($user->is_admin ?? false);
    }
}