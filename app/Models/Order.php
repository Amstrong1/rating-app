<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $append = ['formatted_delay'];

    public function getFormattedDelayAttribute()
    {
        return getFormattedDate($this->delay);
    }
}
