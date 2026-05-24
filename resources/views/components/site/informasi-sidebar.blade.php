@props([
    'searchVisible' => true,
    'activeCategory' => 'Semua',
    'categories' => [],
    'popularPosts' => [],
    'latestPosts' => [],
])

<aside class="space-y-8">
    @if ($searchVisible)
        <div>
            <h4 class="font-display text-lg text-dark mb-3">Pencarian</h4>
            <div class="relative">
                <x-site.icon name="Search"
                    class="absolute left-4 top-1/2 -translate-y-1/2 size-4 text-muted-foreground" />
                <input wire:model.live.debounce.300ms="search" placeholder="Cari artikel..."
                    class="w-full pl-11 pr-4 py-3 rounded-full bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition">
            </div>
        </div>
    @endif

    <div>
        @if ($searchVisible)
            <h4 class="font-display text-lg text-dark mb-3">Kategori</h4>
            <div class="flex flex-wrap gap-2">
                @foreach ($categories as $item)
                    <button type="button" wire:click="setCategory('{{ $item }}')"
                        class="px-3 py-1.5 rounded-full text-sm transition {{ $activeCategory === $item ? 'bg-primary text-primary-foreground' : 'bg-surface text-dark hover:bg-primary-light' }}">
                        {{ $item }}
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    <div>
        <h4 class="font-display text-lg text-dark mb-3">Post Terpopuler</h4>
        <ul class="space-y-3">
            @foreach ($popularPosts as $post)
                <li class="flex gap-3 group cursor-pointer">
                    <img src="{{ data_get($post, 'image') }}" alt="{{ data_get($post, 'title') }}"
                        class="size-16 rounded-lg object-cover shrink-0" loading="lazy" decoding="async">
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-muted-foreground">{{ data_get($post, 'date') }}</div>
                        <div class="text-sm font-medium text-dark line-clamp-2 group-hover:text-primary transition">
                            {{ data_get($post, 'title') }}
                        </div>
                        <div class="mt-1 text-[11px] text-muted-foreground">
                            {{ data_get($post, 'views', 0) }}x dilihat
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h4 class="font-display text-lg text-dark mb-3">Artikel Terbaru</h4>
        <ul class="space-y-3">
            @foreach ($latestPosts as $post)
                <li class="flex gap-3 group cursor-pointer">
                    <img src="{{ data_get($post, 'image') }}" alt="{{ data_get($post, 'title') }}"
                        class="size-16 rounded-lg object-cover shrink-0" loading="lazy" decoding="async">
                    <div class="min-w-0 flex-1">
                        <div class="text-xs text-muted-foreground">{{ data_get($post, 'date') }}</div>
                        <div class="text-sm font-medium text-dark line-clamp-2 group-hover:text-primary transition">
                            {{ data_get($post, 'title') }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
