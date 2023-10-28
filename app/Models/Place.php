<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;    

    /**
     * Get the structure that owns the place.
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }
}
