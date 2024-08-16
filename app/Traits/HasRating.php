<?php

namespace App\Traits;

trait HasRating
{
    /**
     * Get the rating stars as a string.
     *
     * This accessor method returns a string of stars representing the vehicle's rating
     * on a 5-star scale. Full stars (★) represent the rating, and empty stars (☆) fill
     * the remaining slots.
     *
     * @return string The rating represented as stars.
     */
    public function getRatingStarsAttribute()
    {
        $rating = $this->rating ?? 0; // Default rating is 0 if not set
        return str_repeat('★', $rating) . str_repeat('☆', 5 - $rating); // Assume a 5-star rating system
    }
}
