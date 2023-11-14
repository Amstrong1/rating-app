<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'structure_id',
        'name',
        'email',
        'password',
        'role',
    ];

    protected $append = [
        'place_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the structure that owns the user.
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class);
    }

    /**
     * Get the place that owns the user.
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function getPlaceNameAttribute()
    {
        if ($this->role === 'admin') {
            return 'Administrateur';
        } else {
            return $this->place ?? 'Aucun poste affecté';
        }
    }

    /**
     * Get the rate that owns the user.
     */
    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }
}
