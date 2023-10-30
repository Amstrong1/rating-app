<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;

    protected $append = ['question', 'user', 'rate_date', 'answer_formatted'];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getQuestionAttribute()
    {
        return $this->quiz->question;
    }

    public function getRateDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }

    public function getAnswerFormattedAttribute()
    {
        $answer = '';
        if ($this->answer == true) {
            $answer = 'Oui';
        } else {
            $answer = 'Non';
        }
        
        return $answer;
    }
}
