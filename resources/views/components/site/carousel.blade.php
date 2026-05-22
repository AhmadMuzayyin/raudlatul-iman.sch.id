@props(['slides'])

<section data-carousel data-interval="5000" class="relative h-[92vh] min-h-[560px] overflow-hidden">
    @foreach ($slides as $slide)
        <div
            data-carousel-slide
            class="absolute inset-0 transition-opacity duration-1000 {{ $loop->first ? 'opacity-100' : 'opacity-0 pointer-events-none' }}"
            aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
        >
            <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="absolute inset-0 w-full h-full object-cover scale-105">
            <div class="absolute inset-0 bg-gradient-to-br from-dark/85 via-dark/60 to-primary-dark/70"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-b from-transparent to-background backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 noise opacity-30"></div>

            <div class="relative h-full container mx-auto px-4 lg:px-8 flex items-center">
                <div class="max-w-2xl">
                    <span class="inline-block px-3 py-1 rounded-full glass text-xs uppercase tracking-widest text-white animate-fade-up">
                        {{ $slide['badge'] }}
                    </span>
                    <h1 class="mt-5 font-display text-5xl md:text-7xl text-white leading-[1.05] animate-fade-up">
                        {{ $slide['title'] }}
                    </h1>
                    <p class="mt-5 text-lg text-white/80 max-w-xl animate-fade-up">{{ $slide['subtitle'] }}</p>
                    <a href="{{ $slide['ctaHref'] }}" wire:navigate class="mt-8 inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-primary text-primary-foreground font-medium hover:bg-primary-dark transition shadow-xl shadow-primary/40 animate-fade-up">
                        {{ $slide['ctaLabel'] }}
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M7 5.5 11.5 10 7 14.5M8.5 10h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <button type="button" data-carousel-prev class="absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 size-12 rounded-full glass grid place-items-center text-white hover:bg-primary hover:border-primary transition z-10" aria-label="Sebelumnya">
        <svg class="size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m12.5 5.5-5 4.5 5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <button type="button" data-carousel-next class="absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 size-12 rounded-full glass grid place-items-center text-white hover:bg-primary hover:border-primary transition z-10" aria-label="Berikutnya">
        <svg class="size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="m7.5 5.5 5 4.5-5 4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>

    <div class="absolute bottom-32 left-1/2 -translate-x-1/2 flex gap-2 z-10">
        @foreach ($slides as $slide)
            <button type="button" data-carousel-dot class="h-2 rounded-full transition-all {{ $loop->first ? 'w-10 bg-primary' : 'w-2 bg-white/50' }}" aria-label="Slide {{ $loop->iteration }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}"></button>
        @endforeach
    </div>
</section>