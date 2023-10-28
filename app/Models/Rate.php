<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;

    protected $append = ['question, yes_percent', 'no_percent'];

    /**
     * Get the structure that owns the rate.
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function getQuestionAttribute()
    {
        return $this->quiz->question;
    }

    // public function getYesPercentAttribute()
    // {
    //     return $this->belongsTo(Structure::class);
    // }

    // public function getNoPercentAttribute()
    // {
    //     return $this->belongsTo(Structure::class);
    // }
}
