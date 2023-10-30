<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;  

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
}
