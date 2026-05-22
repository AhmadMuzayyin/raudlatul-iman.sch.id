<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

#[Fillable('institution_id', 'category_id', 'slug', 'title', 'content', 'status')]
class Post extends Model
{
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    protected static function booted(): void
    {
        static::deleting(function (Post $post): void {
            $content = $post->content ?? '';

            if (! filled($content)) {
                return;
            }

            libxml_use_internal_errors(true);

            $doc = new \DOMDocument;

            $doc->loadHTML('<?xml encoding="utf-8" ?><div>'.$content.'</div>');

            $tags = array_merge(
                iterator_to_array($doc->getElementsByTagName('img')),
                iterator_to_array($doc->getElementsByTagName('video')),
                iterator_to_array($doc->getElementsByTagName('source')),
                iterator_to_array($doc->getElementsByTagName('a'))
            );

            foreach ($tags as $tag) {
                $attr = $tag->hasAttribute('src') ? 'src' : ($tag->hasAttribute('href') ? 'href' : null);

                if (! $attr) {
                    continue;
                }

                $url = $tag->getAttribute($attr);

                if (! filled($url)) {
                    continue;
                }

                $path = null;

                $parsed = parse_url($url);
                $pathPart = $parsed['path'] ?? $url;

                if (str_starts_with($pathPart, '/storage/')) {
                    $path = ltrim(substr($pathPart, strlen('/storage/')), '/');
                }

                if ($path === null) {
                    foreach (['/storage/', '/uploads/', '/files/'] as $segment) {
                        $pos = strpos($pathPart, $segment);
                        if ($pos !== false) {
                            $path = ltrim(substr($pathPart, $pos + strlen($segment)), '/');
                            break;
                        }
                    }
                }

                if ($path) {
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    } elseif (Storage::exists($path)) {
                        Storage::delete($path);
                    }
                }
                $possibleIds = [];
                foreach (['data-id', 'data-file-id', 'data-attachment-id', 'id'] as $a) {
                    if ($tag->hasAttribute($a)) {
                        $possibleIds[] = $tag->getAttribute($a);
                    }
                }

                $attr = $tag->hasAttribute('src') ? 'src' : ($tag->hasAttribute('href') ? 'href' : null);
                if ($attr) {
                    $possibleIds[] = $tag->getAttribute($attr);
                }

                foreach ($possibleIds as $candidate) {
                    if (! filled($candidate)) {
                        continue;
                    }

                    $path = null;
                    $parsed = parse_url($candidate);
                    $pathPart = $parsed['path'] ?? $candidate;

                    if (strpos($candidate, '/') === false && strpos($candidate, '.') !== false) {
                        $path = ltrim($candidate, '/');
                    }

                    if ($path === null && str_starts_with($pathPart, '/storage/')) {
                        $path = ltrim(substr($pathPart, strlen('/storage/')), '/');
                    }

                    if ($path === null) {
                        foreach (['/storage/', '/uploads/', '/files/'] as $segment) {
                            $pos = strpos($pathPart, $segment);
                            if ($pos !== false) {
                                $path = ltrim(substr($pathPart, $pos + strlen($segment)), '/');
                                break;
                            }
                        }
                    }

                    if ($path === null && strpos($candidate, '.') !== false) {
                        $path = ltrim($candidate, '/');
                    }

                    if (! $path) {
                        continue;
                    }

                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                        break;
                    } elseif (Storage::exists($path)) {
                        Storage::delete($path);
                        break;
                    }
                }
            }

            libxml_clear_errors();
        });
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function seo(): HasOne
    {
        return $this->hasOne(Seo::class);
    }

    public function postTags(): HasMany
    {
        return $this->hasMany(PostTag::class, 'post_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
