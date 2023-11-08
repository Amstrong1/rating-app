<?php

namespace App\Models;

use App\Models\User;
use App\Models\Structure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $append = [
        'formated_date',
        'user_name'
    ];

    public function getFormatedDateAttribute(){
        return getFormattedDate($this->created_at);
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