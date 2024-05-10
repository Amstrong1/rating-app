<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    public $append = [
        'question',
        'formatted_answer',
        'formatted_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }   

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }

    public function getQuestionAttribute()
    {
        return $this->quiz->question;
    }

    public function getFormattedAnswerAttribute()
    {
        return $this->answer == true ? 'Oui' : 'Non';
    }

    public function getFormattedDateAttribute()
    {
        return getFormattedDateTime($this->created_at);
    }
}
