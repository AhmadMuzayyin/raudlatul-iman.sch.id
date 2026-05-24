@props(['testimonials'])

<section class="py-24 bg-surface">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span
                class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Kata
                Mereka</span>
            <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">Testimoni</h2>
        </div>

        <div data-testimonial-carousel data-interval="6000" class="relative max-w-6xl mx-auto">
            <div class="overflow-hidden">
                <div data-testimonial-track class="flex transition-transform duration-500 ease-out">
                    @foreach ($testimonials as $testimonial)
                        <article data-testimonial-slide class="w-full shrink-0 px-2">
                            <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 h-full relative overflow-hidden">
                                <svg class="absolute -top-2 -left-2 size-24 text-primary-light" viewBox="0 0 96 96"
                                    fill="none" aria-hidden="true">
                                    <path
                                        d="M28 52h-8V36h16v16c0 16-8 28-24 32V68c8 0 16-8 16-16Zm48 0h-8V36h16v16c0 16-8 28-24 32V68c8 0 16-8 16-16Z"
                                        fill="currentColor" />
                                </svg>
                                <p class="relative font-display text-lg md:text-xl text-dark leading-relaxed min-h-40">
                                    "{{ $testimonial['text'] }}"
                                </p>
                                <div class="mt-6 flex items-center gap-4 relative">
                                    <img alt="{{ $testimonial['name'] }}" src="{{ $testimonial['avatar'] }}"
                                        loading="lazy" decoding="async"
                                        class="size-12 rounded-full object-cover ring-2 ring-primary">
                                    <div>
                                        <div class="font-display text-base text-dark">{{ $testimonial['name'] }}</div>
                                        <div class="text-sm text-primary">{{ $testimonial['role'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="mt-6 flex items-center justify-center gap-3">
                <button type="button" data-testimonial-prev
                    class="size-10 rounded-full bg-white shadow border border-primary-light grid place-items-center hover:bg-primary hover:text-white transition"
                    aria-label="Sebelumnya">
                    <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="m12.5 5.5-5 4.5 5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <div data-testimonial-dots class="flex items-center gap-2"></div>

                <button type="button" data-testimonial-next
                    class="size-10 rounded-full bg-white shadow border border-primary-light grid place-items-center hover:bg-primary hover:text-white transition"
                    aria-label="Berikutnya">
                    <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="m7.5 5.5 5 4.5-5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
