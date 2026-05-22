@props(['post'])

<article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all border border-transparent hover:border-primary/30">
    <div class="relative aspect-[4/3] overflow-hidden">
        <img src="{{ data_get($post, 'image') }}" alt="{{ data_get($post, 'title') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-primary text-primary-foreground text-xs font-medium">
            {{ data_get($post, 'category') }}
        </span>
    </div>

    <div class="p-6">
        <div class="flex items-center gap-2 text-xs text-muted-foreground">
            <svg class="size-3" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            {{ data_get($post, 'date') }}
        </div>

        <h3 class="mt-3 font-display text-xl text-dark group-hover:text-primary transition line-clamp-2">
            {{ data_get($post, 'title') }}
        </h3>

        <p class="mt-2 text-sm text-muted-foreground line-clamp-3">{{ data_get($post, 'excerpt') }}</p>

        <a href="{{ url('/informasi/'.data_get($post, 'slug')) }}" wire:navigate class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-primary group-hover:gap-2 transition-all">
            Baca selengkapnya
            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m7.5 5.5 5 4.5-5 4.5M8.5 10h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
    </div>
</article>