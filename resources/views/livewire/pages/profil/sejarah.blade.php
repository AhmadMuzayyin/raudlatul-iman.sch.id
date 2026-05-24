<div>
    <x-site.page-header title="Sejarah Pesantren" :crumbs="[['label' => 'Profil', 'to' => url('/profil')], ['label' => 'Sejarah']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <p class="text-lg text-muted-foreground leading-relaxed mb-16">
                Perjalanan panjang Pondok Pesantren Raudlatul Iman dimulai dari sebuah cita-cita sederhana: menjadikan
                Al-Qur'an sebagai pelita di tengah zaman. Berikut rangkaian tonggak penting dalam sejarah kami.
            </p>

            @if ($histories->isNotEmpty())
                <div class="grid gap-6">
                    @foreach ($histories as $history)
                        <article class="p-6 rounded-2xl bg-white shadow-sm border border-primary-light/60">
                            <div class="grid md:grid-cols-[160px_1fr] gap-6 items-start">
                                <img src="{{ $history->image ? asset('storage/' . $history->image) : 'https://picsum.photos/seed/history-' . $history->id . '/320/240' }}"
                                    alt="Sejarah - {{ $history->created_at?->translatedFormat('Y') ?? 'Sejarah' }}"
                                    class="w-full rounded-xl object-cover aspect-[4/3]">
                                <div>
                                    <h3 class="font-display text-2xl text-dark">
                                        {{ $history->created_at?->translatedFormat('Y') ?? 'Sejarah' }}</h3>
                                    <p class="mt-2 text-muted-foreground whitespace-pre-line">{{ $history->content }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="relative">
                    <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-primary-light -translate-x-1/2">
                    </div>

                    @foreach ($timeline as $item)
                        <div
                            class="relative mb-12 md:grid md:grid-cols-2 md:gap-12 {{ $loop->odd ? '' : 'md:[direction:rtl]' }}">
                            <div
                                class="pl-12 md:pl-0 {{ $loop->odd ? 'md:text-right md:pr-12' : 'md:[direction:ltr] md:pl-12' }}">
                                <div
                                    class="absolute left-4 md:left-1/2 size-4 rounded-full bg-primary ring-4 ring-primary-light -translate-x-1/2 mt-2">
                                </div>
                                <div class="font-display text-4xl text-gradient-emerald">{{ $item['year'] }}</div>
                                <h3 class="mt-2 font-display text-xl text-dark">{{ $item['title'] }}</h3>
                                <p class="mt-2 text-muted-foreground">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
