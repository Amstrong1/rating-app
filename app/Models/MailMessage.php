<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailMessage extends Model
{
    use HasFactory;

    public $append = [
        'formatted_date'
    ];

    public function getFormattedDateAttribute(){
        return getFormattedDateTime($this->created_at);
    }
}
