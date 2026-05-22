<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('code', 'name', 'description')]
class Institution extends Model
{
    protected static function booted(): void
    {
        static::creating(function (Institution $institution) {
            if (empty($institution->code)) {
                $institution->code = strtoupper(substr(uniqid(), -6));
            }
        });
    }
}
