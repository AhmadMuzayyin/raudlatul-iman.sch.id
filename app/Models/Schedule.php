<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['institution_id', 'category_id', 'title', 'time', 'location', 'date'])]
class Schedule extends Model
{
    protected $casts = [
        'date' => 'date',
    ];

    protected function dateLabel(): Attribute
    {
        return Attribute::make(
            get: fn (): string => $this->date?->locale('id')->translatedFormat('d-F-Y') ?? '',
        );
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
