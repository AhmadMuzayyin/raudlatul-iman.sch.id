<?php

namespace App\Livewire\Pages\Informasi;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Post $post;

    public array $popularPosts = [];

    public array $latestPosts = [];

    public array $categories = [];

    public function mount(Post $post, Request $request): void
    {
        $this->post = $post->loadMissing(['category', 'institution', 'tags', 'author', 'seo']);

        $this->popularPosts = $this->sidebarPostsQuery()
            ->withCount('postViews')
            ->orderByDesc('post_views_count')
            ->latest('created_at')
            ->take(5)
            ->get()
            ->map(fn (Post $sidebarPost): array => $this->toPostCard($sidebarPost, $sidebarPost->post_views_count ?? 0))
            ->values()
            ->all();

        $this->latestPosts = $this->sidebarPostsQuery()
            ->latest('created_at')
            ->take(5)
            ->get()
            ->map(fn (Post $sidebarPost): array => $this->toPostCard($sidebarPost))
            ->values()
            ->all();

        $this->categories = collect(Category::query()->orderBy('name', 'asc')->pluck('name')->all())
            ->values()
            ->all();

        $visitorKey = sha1(($request->ip() ?? '0.0.0.0').'|'.($request->userAgent() ?? 'unknown'));

        $this->post->postViews()->firstOrCreate(
            ['post_id' => $this->post->id],
            [
                'ip_address' => $request->ip() ?? '0.0.0.0',
                'user_agent' => ['raw' => $request->userAgent() ?? 'unknown'],
            ]
        );
    }

    public function render(): View
    {
        return view('livewire.pages.informasi.show', [
            'seo' => $this->post->seo,
        ]);
    }

    private function sidebarPostsQuery()
    {
        return Post::query()
            ->published()
            ->with(['category', 'institution']);
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
}
