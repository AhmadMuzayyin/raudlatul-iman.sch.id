<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Informasi — Pondok Pesantren Raudlatul Iman')]
class Informasi extends Component
{
    public string $search = '';

    public string $category = 'Semua';

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function render(): View
    {
        $posts = Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->latest()
            ->get()
            ->map(fn(Post $post): array => [
                'slug' => $post->slug,
                'title' => $post->title,
                'excerpt' => Str::of(strip_tags((string) $post->content))->squish()->limit(150)->toString(),
                'image' => sprintf('https://picsum.photos/seed/%s/600/450', $post->slug ?: $post->id),
                'category' => $post->category?->name ?? 'Informasi',
                'date' => $post->created_at?->translatedFormat('d M Y') ?? now()->translatedFormat('d M Y'),
            ]);

        $filteredPosts = $posts
            ->filter(function (array $post): bool {
                $matchesCategory = $this->category === 'Semua' || $post['category'] === $this->category;
                $matchesSearch = filled($this->search) === false || str_contains(mb_strtolower($post['title']), mb_strtolower($this->search));

                return $matchesCategory && $matchesSearch;
            })
            ->values();

        return view('livewire.pages.informasi', [
            'posts' => $filteredPosts,
            'latestPosts' => $posts->take(4)->values(),
            'categories' => collect(['Semua'])
                ->concat(Category::query()->orderBy('name', 'asc')->pluck('name')->all())
                ->unique()
                ->values()
                ->all(),
        ]);
    }
}
