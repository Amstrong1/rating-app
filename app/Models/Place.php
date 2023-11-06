<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;    

    /**
     * Get the structure that owns the place.
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * Get the structure that owns the place.
     */
    public function places_quizzes(): HasMany
    {
        return $this->hasMany(PlaceQuiz::class);
    }
    
    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, 'place_quizzes');
    }
}
