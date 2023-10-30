<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function getFormattedDate($date): String
{
    Carbon::setLocale('fr');
    $new_date = Carbon::createFromDate($date);
    $new_date_format = $new_date->day . ' ' . $new_date->monthName . ' ' . $new_date->year;
    return $new_date_format;
}

