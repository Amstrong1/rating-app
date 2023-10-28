<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Structure extends Model
{
    use HasFactory;
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }
    
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
    
    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }
}
