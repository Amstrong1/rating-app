<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appreciation extends Model
{
    use HasFactory;

    protected $table = 'appreciations';

    protected $append = [
        'formated_date',
        'user_name'
    ];

    public function getFormatedDateAttribute(){
        return getFormattedDateTime($this->created_at);
    }

    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
