<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Structure extends Model
{
    use HasFactory;

    protected $append = [
        'formated_date'
    ];

    public function getFormatedDateAttribute(){
        return getFormattedDate($this->created_at);
    }
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }
    
    public function places_quizzes(): HasMany
    {
        return $this->hasMany(PlaceQuiz::class);
    }
    
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
    
    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
