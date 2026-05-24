<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
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
        $posts = $this->postsQuery()
            ->get()
            ->map(fn (Post $post): array => $this->toPostCard($post));

        $popularPosts = Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->withCount('postViews')
            ->orderByDesc('post_views_count')
            ->latest('created_at')
            ->take(5)
            ->get()
            ->map(fn (Post $post): array => $this->toPostCard($post, $post->post_views_count ?? 0))
            ->values();

        $latestPosts = Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->latest('created_at')
            ->take(5)
            ->get()
            ->map(fn (Post $post): array => $this->toPostCard($post))
            ->values();

        return view('livewire.pages.informasi', [
            'posts' => $posts->values(),
            'popularPosts' => $popularPosts,
            'latestPosts' => $latestPosts,
            'categories' => collect(['Semua'])
                ->concat(Category::query()->orderBy('name', 'asc')->pluck('name')->all())
                ->unique()
                ->values()
                ->all(),
        ]);
    }

    private function postsQuery(): Builder
    {
        return Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->when($this->category !== 'Semua', function (Builder $query): void {
                $query->whereHas('category', function (Builder $categoryQuery): void {
                    $categoryQuery->where('name', $this->category);
                });
            })
            ->when(filled($this->search), function (Builder $query): void {
                $search = trim($this->search);

                $query->where(function (Builder $searchQuery) use ($search): void {
                    $searchQuery->where('title', 'like', '%'.$search.'%');

                    if ($this->supportsFullTextSearch()) {
                        $searchQuery->orWhereFullText('content', $search);
                    } else {
                        $searchQuery->orWhere('content', 'like', '%'.$search.'%');
                    }
                });
            })
            ->latest();
    }

    private function toPostCard(Post $post, int $viewsCount = 0): array
    {
        return [
            'slug' => $post->slug,
            'title' => $post->title,
            'excerpt' => Str::of(strip_tags((string) $post->content))->squish()->limit(150)->toString(),
            'image' => $post->image,
            'category' => $post->category?->name,
            'date' => $post->created_at?->translatedFormat('d M Y') ?? now()->translatedFormat('d M Y'),
            'views' => $viewsCount,
        ];
    }

    private function supportsFullTextSearch(): bool
    {
        return in_array(Post::query()->getConnection()->getDriverName(), ['mysql', 'mariadb', 'pgsql'], true);
    }
}
