<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rate extends Model
{
    use HasFactory;

    protected $append = [
        'question',
        'user',
        'rate_date',
        'satisfaction',
        'appreciation'
    ];

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

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function appreciation(): HasOne
    {
        return $this->hasOne(Appreciation::class);
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

    public function getSatisfactionAttribute()
    {
        $answerYes = $this->answers()->where('answer', true)->count();
        $answers = $this->answers()->count();
        if ($answers !== 0) {
            $ratio = $answerYes / $answers;
        } else {
            $ratio = 1;
        }
        $satisfaction = "";

        if ($ratio == 1) {
            $satisfaction = "Totalement satisfait";
        } elseif ($ratio >= 0.8 && $ratio < 1) {
            $satisfaction = "Satisfait";
        } elseif ($ratio >= 0.5 && $ratio < 0.8) {
            $satisfaction = "Moyennement Satisfait";
        } elseif ($ratio >= 0.3 && $ratio < 0.5) {
            $satisfaction = "Passablemnt Satisfait";
        } elseif ($ratio < 0.3) {
            $satisfaction = "Non Satisfait";
        }

        return $satisfaction;
    }
    public function getAppreciationAttribute()
    {
        if ($this->appreciation()->first() !== null) {
            $appreciation = $this->appreciation()->first()->appreciation;
        } else {
            $appreciation = 'Pas d\'avis';
        }
        return $appreciation;
    }
}
