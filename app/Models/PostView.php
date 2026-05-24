<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('post_id', 'visitor_key', 'ip_address', 'user_agent')]
class PostView extends Model
{
    protected function casts(): array
    {
        return [
            'user_agent' => 'array',
        ];
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    protected function userAgentValue(): Attribute
    {
        return Attribute::make(
            get: fn (): ?string => data_get($this->user_agent, 'raw'),
        );
    }
}
