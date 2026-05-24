<?php

namespace App\Livewire\Pages\Home;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class InformasiSection extends Component
{
    public function render(): View
    {
        return view('livewire.pages.home.informasi-section', [
            'announcements' => $this->announcements(),
        ]);
    }

    public function placeholder(): string
    {
        return <<<'HTML'
                <section class="py-24 bg-surface">
                    <div class="container mx-auto px-4 lg:px-8">
                        <div class="mb-12 flex flex-wrap items-end justify-between gap-4">
                            <div class="space-y-4">
                                <div class="h-6 w-24 rounded-full bg-primary-light"></div>
                                <div class="h-12 w-64 max-w-full rounded-2xl bg-surface/70"></div>
                            </div>
                            <div class="h-10 w-36 rounded-full bg-surface/70"></div>
                        </div>

                        <div class="grid gap-8 lg:grid-cols-2">
                            <div class="overflow-hidden rounded-3xl border border-border bg-white p-5">
                                <div class="aspect-[16/10] w-full rounded-2xl bg-surface animate-pulse"></div>
                                <div class="mt-5 h-8 w-5/6 rounded-xl bg-surface animate-pulse"></div>
                                <div class="mt-3 h-4 w-full rounded-xl bg-surface animate-pulse"></div>
                                <div class="mt-2 h-4 w-4/5 rounded-xl bg-surface animate-pulse"></div>
                            </div>

                            <div class="space-y-5">
                                <div class="flex gap-5 rounded-2xl border border-border bg-white p-5">
                                    <div class="size-28 shrink-0 rounded-xl bg-surface animate-pulse"></div>
                                    <div class="flex-1 space-y-3">
                                        <div class="h-5 w-28 rounded-full bg-surface animate-pulse"></div>
                                        <div class="h-5 w-11/12 rounded-xl bg-surface animate-pulse"></div>
                                        <div class="h-4 w-4/5 rounded-xl bg-surface animate-pulse"></div>
                                    </div>
                                </div>
                                <div class="flex gap-5 rounded-2xl border border-border bg-white p-5">
                                    <div class="size-28 shrink-0 rounded-xl bg-surface animate-pulse"></div>
                                    <div class="flex-1 space-y-3">
                                        <div class="h-5 w-28 rounded-full bg-surface animate-pulse"></div>
                                        <div class="h-5 w-11/12 rounded-xl bg-surface animate-pulse"></div>
                                        <div class="h-4 w-4/5 rounded-xl bg-surface animate-pulse"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                HTML;
    }

    private function announcements(): array
    {
        $posts = Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->latest('created_at')
            ->take(4)
            ->get();

        $cards = $posts->map(function (Post $post, int $index): array {
            return [
                'date' => $post->created_at?->diffForHumans(),
                'title' => $post->title,
                'excerpt' => Str::of(strip_tags((string) $post->content))
                    ->squish()
                    ->limit(120)
                    ->toString(),
                'image' => $post->image,
            ];
        })->all();

        return array_slice($cards, 0, 4);
    }
}
