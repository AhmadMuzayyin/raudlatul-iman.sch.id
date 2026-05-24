<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('post_id', 'user_id', 'content')]
class PostComment extends Model
{
    //
}
