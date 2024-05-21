<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    public $append = ['formatted_date'];

    public function getFormattedDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }
}
