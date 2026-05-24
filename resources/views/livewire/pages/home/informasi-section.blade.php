<section class="py-24 bg-surface">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
            <div>
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Terbaru</span>
                <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">
                    Informasi & Agenda
                </h2>
            </div>
            <a href="{{ url('/agenda') }}" wire:navigate
                class="text-primary font-medium inline-flex items-center gap-2 hover:gap-3 transition-all">
                Semua agenda
                <x-site.icon name="ArrowRight" class="size-4" />
            </a>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            @if (!empty($announcements) && count($announcements) > 0)
                <article
                    class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition border border-transparent hover:border-primary/30">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img alt="{{ $announcements[0]['title'] }}" src="{{ $announcements[0]['image'] }}"
                            loading="lazy" decoding="async"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <span
                            class="absolute top-5 left-5 px-3 py-1.5 rounded-full bg-primary text-primary-foreground text-xs font-medium inline-flex items-center gap-1.5">
                            <x-site.icon name="Calendar" class="size-3" />
                            {{ $announcements[0]['date'] }}
                        </span>
                    </div>
                    <div class="p-8">
                        <h3 class="font-display text-2xl md:text-3xl text-dark group-hover:text-primary transition">
                            {{ $announcements[0]['title'] }}</h3>
                        <p class="mt-3 text-dark/70">{{ $announcements[0]['excerpt'] }}</p>
                    </div>
                </article>

                <div class="space-y-5">
                    @foreach (array_slice($announcements, 1) as $announcement)
                        <article
                            class="group flex gap-5 bg-white rounded-2xl p-5 shadow-sm hover:shadow-xl transition border border-transparent hover:border-primary/30">
                            <img alt="{{ $announcement['title'] }}" src="{{ $announcement['image'] }}" loading="lazy"
                                decoding="async" class="size-28 rounded-xl object-cover shrink-0">
                            <div class="flex-1">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary-light text-primary-dark text-xs">
                                    <x-site.icon name="Calendar" class="size-3" />
                                    {{ $announcement['date'] }}
                                </span>
                                <h4
                                    class="mt-2 font-display text-lg text-dark group-hover:text-primary transition line-clamp-2">
                                    {{ $announcement['title'] }}</h4>
                                <p class="text-sm text-dark/70 line-clamp-1 mt-1">
                                    {{ $announcement['excerpt'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
