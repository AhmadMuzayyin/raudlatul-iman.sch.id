<div>
    <x-site.page-header title="Agenda Kegiatan" subtitle="Jadwal acara dan kegiatan pesantren mendatang."
        :crumbs="[['label' => 'Agenda']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div data-agenda-tabs class="space-y-6">
            <div class="flex flex-wrap items-center gap-3">
                <button type="button" data-agenda-tab="all"
                    class="agenda-tab inline-flex items-center rounded-full border border-primary-light bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm transition"
                    aria-pressed="true">
                    Semua Lembaga
                </button>

                @foreach ($institutions as $institution)
                    <button type="button" data-agenda-tab="{{ $institution->id }}"
                        class="agenda-tab inline-flex items-center rounded-full border border-primary-light bg-white px-4 py-2 text-sm font-medium text-dark transition hover:border-primary hover:text-primary"
                        aria-pressed="false">
                        {{ $institution->name }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($agenda as $item)
                    @php($parts = explode('-', $item->date_label))
                    <article data-agenda-item data-agenda-institution="{{ $item->institution_id }}"
                        class="group flex flex-col gap-4 rounded-2xl border border-primary-light/60 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-primary hover:shadow-xl">
                        <div class="flex items-start justify-between gap-3">
                            <div class="rounded-2xl bg-gradient-emerald px-4 py-3 text-center text-white shadow-md">
                                <div class="text-[10px] uppercase tracking-[0.3em] text-white/80">
                                    {{ $parts[0] ?? '' }}</div>
                                <div class="font-display text-3xl leading-none">{{ $parts[1] ?? '' }}</div>
                                <div class="mt-1 text-[10px] text-white/80">{{ $parts[2] ?? '' }}</div>
                            </div>

                            <div class="flex flex-wrap justify-end gap-2 text-xs">
                                <span
                                    class="inline-flex items-center rounded-full bg-primary-light px-2.5 py-1 text-primary-dark">{{ $item->category->name }}</span>
                                <span
                                    class="inline-flex items-center rounded-full bg-primary-light px-2.5 py-1 text-primary-dark">{{ $item->institution->name }}</span>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-display text-xl text-dark transition group-hover:text-primary">
                                {{ $item->title }}</h3>
                            <div class="mt-3 flex flex-wrap gap-4 text-sm text-muted-foreground">
                                <span class="inline-flex items-center gap-1.5">
                                    <x-site.icon name="Clock" class="size-4" />
                                    {{ $item->time }} WIB
                                </span>
                                <span class="inline-flex items-center gap-1.5">
                                    <x-site.icon name="MapPin" class="size-4" />
                                    {{ $item->location }}
                                </span>
                                <span class="inline-flex items-center gap-1.5">
                                    <x-site.icon name="Calendar" class="size-4" />
                                    {{ $item->date_label }}
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div data-agenda-empty
                class="hidden rounded-2xl border border-dashed border-primary-light bg-white px-6 py-10 text-center text-sm text-muted-foreground">
                Tidak ada agenda untuk lembaga ini.
            </div>
        </div>
    </section>
</div>
