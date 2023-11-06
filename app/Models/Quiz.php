<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    use HasFactory;

    protected $append = ['place'];

    /**
     * Get the structure that owns the quiz.
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }  

    /**
     * Get the rate that owns the quiz.
     */
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
    
    public function places(): BelongsToMany
    {
        return $this->belongsToMany(Place::class, 'place_quizzes');
    }

    public function getPlaceAttribute() //users_fullname
    {
        $places = [];
        $getPlaces = $this->places()->get();
        foreach ($getPlaces as $getPlace) {
            $places[] = $getPlace->name;
        }
        return $places;
    }
}
