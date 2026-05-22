@props(['testimonials'])

<section class="py-24 bg-surface">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Kata Mereka</span>
            <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">Testimoni</h2>
        </div>

        <div data-testimonial-carousel data-interval="6000" class="relative max-w-3xl mx-auto">
            <div class="bg-white rounded-3xl shadow-xl p-10 md:p-14 relative overflow-hidden">
                <svg class="absolute -top-2 -left-2 size-32 text-primary-light" viewBox="0 0 96 96" fill="none" aria-hidden="true"><path d="M28 52h-8V36h16v16c0 16-8 28-24 32V68c8 0 16-8 16-16Zm48 0h-8V36h16v16c0 16-8 28-24 32V68c8 0 16-8 16-16Z" fill="currentColor"/></svg>

                @foreach ($testimonials as $testimonial)
                    <div data-testimonial-slide class="relative {{ $loop->first ? 'block' : 'hidden' }} animate-fade-in">
                        <p class="font-display text-xl md:text-2xl text-dark leading-relaxed">
                            "{{ $testimonial['text'] }}"
                        </p>
                        <div class="mt-8 flex items-center gap-4">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="size-14 rounded-full object-cover ring-2 ring-primary">
                            <div>
                                <div class="font-display text-lg text-dark">{{ $testimonial['name'] }}</div>
                                <div class="text-sm text-primary">{{ $testimonial['role'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex items-center justify-center gap-3">
                <button type="button" data-testimonial-prev class="size-10 rounded-full bg-white shadow border border-primary-light grid place-items-center hover:bg-primary hover:text-white transition" aria-label="Sebelumnya">
                    <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m12.5 5.5-5 4.5 5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                @foreach ($testimonials as $testimonial)
                    <button type="button" data-testimonial-dot class="h-2 rounded-full transition-all {{ $loop->first ? 'w-8 bg-primary' : 'w-2 bg-primary/30' }}" aria-label="Testimoni {{ $loop->iteration }}"></button>
                @endforeach

                <button type="button" data-testimonial-next class="size-10 rounded-full bg-white shadow border border-primary-light grid place-items-center hover:bg-primary hover:text-white transition" aria-label="Berikutnya">
                    <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m7.5 5.5 5 4.5-5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>