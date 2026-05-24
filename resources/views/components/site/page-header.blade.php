@props(['title', 'subtitle' => null, 'crumbs' => [], 'image' => null])

<section class="relative h-[42vh] min-h-[320px] overflow-hidden">
    <img alt="{{ $title }}" src="{{ $image ?? 'https://picsum.photos/seed/pesantren-header/1920/600' }}"
        loading="eager" fetchpriority="high" decoding="async" class="absolute inset-0 w-full h-full object-cover scale-110">
    <div class="absolute inset-0 bg-gradient-to-br from-dark/90 via-primary-dark/80 to-dark/95 backdrop-blur-sm"></div>
    <div class="absolute inset-0 noise opacity-40"></div>

    <div class="relative h-full container mx-auto px-4 lg:px-8 flex flex-col justify-end pb-12">
        <nav class="flex items-center gap-2 text-xs text-white/70 mb-4 animate-fade-up">
            <a href="{{ url('/') }}" wire:navigate class="flex items-center gap-1 hover:text-white">
                <svg class="size-3" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M3 11.5 12 4l9 7.5M5 10.5V20h14v-9.5" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Beranda
            </a>

            @foreach ($crumbs as $crumb)
                <span class="flex items-center gap-2">
                    <svg class="size-3" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M7.5 5.5 11.5 10l-4 4.5" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    @if (!empty($crumb['to']))
                        <a href="{{ $crumb['to'] }}" wire:navigate class="hover:text-white">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-white">{{ $crumb['label'] }}</span>
                    @endif
                </span>
            @endforeach
        </nav>

        @if ($subtitle)
            <p class="mt-3 max-w-2xl text-white/80 animate-fade-up">{{ $subtitle }}</p>
        @endif
    </div>
</section>
