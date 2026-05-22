<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'start_time', 'end_time', 'date'])]
class Schedule extends Model
{
    //
}
