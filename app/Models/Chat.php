<?php

namespace App\Models;

use App\Models\Structure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }  
}
