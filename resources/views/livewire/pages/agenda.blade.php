<div>
    <x-site.page-header title="Agenda Kegiatan" subtitle="Jadwal acara dan kegiatan pesantren mendatang."
        :crumbs="[['label' => 'Agenda']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="space-y-5 max-w-4xl mx-auto">
            @foreach ($agenda as $item)
                @php($parts = explode(' ', $item['date']))
                <article
                    class="group flex flex-col sm:flex-row gap-6 p-6 rounded-2xl bg-white border border-primary-light/60 hover:border-primary hover:shadow-2xl transition">
                    <div class="sm:w-32 shrink-0 text-center bg-gradient-emerald rounded-2xl p-5 text-white">
                        <div class="text-xs uppercase tracking-widest text-white/80">{{ $parts[1] ?? '' }}</div>
                        <div class="font-display text-4xl">{{ $parts[0] ?? '' }}</div>
                        <div class="text-xs text-white/80">{{ $parts[2] ?? '' }}</div>
                    </div>
                    <div class="flex-1">
                        <span
                            class="inline-block px-2.5 py-1 rounded-full bg-primary-light text-primary-dark text-xs">{{ $item['category'] }}</span>
                        <h3 class="mt-2 font-display text-2xl text-dark group-hover:text-primary transition">
                            {{ $item['title'] }}</h3>
                        <div class="mt-3 flex flex-wrap gap-5 text-sm text-muted-foreground">
                            <span class="inline-flex items-center gap-1.5"><x-site.icon name="Clock" class="size-4" />
                                {{ $item['time'] }} WIB</span>
                            <span class="inline-flex items-center gap-1.5"><x-site.icon name="MapPin" class="size-4" />
                                {{ $item['place'] }}</span>
                            <span class="inline-flex items-center gap-1.5"><x-site.icon name="Calendar"
                                    class="size-4" /> {{ $item['date'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>
