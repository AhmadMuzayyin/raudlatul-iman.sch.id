<div>
    <x-site.page-header :title="$post->title" :crumbs="[['label' => 'Informasi', 'to' => url('/informasi')], ['label' => $post->title]]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl overflow-hidden shadow-xl border border-primary-light/60">
            <img src="{{ $post->image ?? 'https://picsum.photos/seed/' . $post->slug . '/1200/700' }}"
                alt="{{ $post->title }}" class="w-full aspect-[16/9] object-cover">

            <div class="p-8 md:p-12">
                <div class="flex flex-wrap items-center gap-3 text-sm text-muted-foreground">
                    <span
                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary-light text-primary-dark text-xs">
                        {{ $post->category?->name ?? 'Informasi' }}
                    </span>
                    <span>{{ $post->created_at?->translatedFormat('d M Y') }}</span>
                    <span>{{ $post->institution?->name }}</span>
                </div>

                <h1 class="mt-4 font-display text-4xl md:text-5xl text-dark">{{ $post->title }}</h1>

                <article
                    class="prose prose-lg max-w-none mt-8 prose-headings:font-display prose-headings:text-dark prose-a:text-primary prose-strong:text-dark">
                    {!! $post->content !!}
                </article>

                @if ($post->tags->isNotEmpty())
                    <div class="mt-8 flex flex-wrap gap-2">
                        @foreach ($post->tags as $tag)
                            <span class="px-3 py-1 rounded-full bg-surface text-sm text-dark">{{ $tag->tag }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
