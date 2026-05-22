<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['code', 'name'])]
class Category extends Model
{
    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            if (empty($category->code)) {
                $category->code = strtoupper(substr(uniqid(), -6));
            }
        });
    }
}
