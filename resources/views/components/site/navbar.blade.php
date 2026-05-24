@php
    $paths = [
        'home' => '/',
        'profil.index' => '/profil',
        'profil.identitas' => '/profil/identitas',
        'profil.visi-misi' => '/profil/visi-misi',
        'profil.sejarah' => '/profil/sejarah',
        'profil.struktur-organisasi' => '/profil/struktur-organisasi',
        'pendidikan.pendaftaran' => '/pendidikan/pendaftaran',
        'pendidikan.fasilitas' => '/pendidikan/fasilitas',
        'pendidikan.layanan' => '/pendidikan/layanan',
        'agenda' => '/agenda',
        'informasi.index' => '/informasi',
        'kontak' => '/kontak',
    ];

    $pathFor = fn(string $route): string => $paths[$route] ?? '/';
    $isActive = fn(string $route): bool => request()->routeIs($route);
    $hasActiveChild = fn(array $routes): bool => collect($routes)->contains(
        fn(string $route): bool => $isActive($route),
    );
    $activeLinkClass = 'text-primary';
    $activeDropdownLinkClass = 'text-primary bg-surface';
    $activeMobileLinkClass = 'bg-surface text-primary';
    $activeUnderlineClass = 'scale-x-100';

    $primaryLinks = [
        ['name' => 'Beranda', 'route' => 'home'],
        [
            'name' => 'Profil',
            'children' => [
                ['name' => 'Profil', 'route' => 'profil.index'],
                ['name' => 'Identitas', 'route' => 'profil.identitas'],
                ['name' => 'Visi & Misi', 'route' => 'profil.visi-misi'],
                ['name' => 'Sejarah', 'route' => 'profil.sejarah'],
                ['name' => 'Struktur Organisasi', 'route' => 'profil.struktur-organisasi'],
            ],
        ],
        [
            'name' => 'Pendidikan',
            'children' => [
                ['name' => 'Pendaftaran', 'route' => 'pendidikan.pendaftaran'],
                ['name' => 'Fasilitas', 'route' => 'pendidikan.fasilitas'],
                ['name' => 'Layanan', 'route' => 'pendidikan.layanan'],
            ],
        ],
        ['name' => 'Agenda', 'route' => 'agenda'],
        ['name' => 'Informasi', 'route' => 'informasi.index'],
        ['name' => 'Kontak', 'route' => 'kontak'],
    ];
@endphp

<div data-site-navbar class="sticky top-0 z-[1000]">
    <header class="transition-all duration-300 bg-white/60 backdrop-blur-md">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ $pathFor('home') }}" wire:navigate class="flex items-center gap-3 group">
                    <img src="{{ $settings->logo }}" alt="{{ $settings->name ?? 'Raudlatul Iman' }}"
                        class="size-11 rounded-full bg-gradient-emerald grid place-items-center text-white font-display text-xl shadow-lg shadow-primary/30 group-hover:scale-105 transition">
                    <div class="leading-tight">
                        <div class="font-display text-lg text-dark">Raudlatul Iman</div>
                        <div class="text-[11px] uppercase tracking-widest text-primary-dark">Pondok Pesantren</div>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-1">
                    @foreach ($primaryLinks as $item)
                        @if (isset($item['children']))
                            <div class="relative group">
                                <button type="button" @class([
                                    'flex items-center gap-1 px-4 py-2 text-sm font-medium text-dark hover:text-primary transition',
                                    $activeLinkClass => $hasActiveChild(array_column($item['children'], 'route')),
                                ])>
                                    {{ $item['name'] }}
                                    <svg class="size-4 transition group-hover:rotate-180" viewBox="0 0 20 20"
                                        fill="none" aria-hidden="true">
                                        <path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-0 top-full pt-2 min-w-56 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition">
                                    <div
                                        class="bg-white rounded-xl shadow-xl border-t-2 border-primary overflow-hidden">
                                        @foreach ($item['children'] as $child)
                                            <a href="{{ $pathFor($child['route']) }}" wire:navigate.hover
                                                class="block px-5 py-3 text-sm text-dark hover:bg-surface hover:text-primary transition"
                                                @class([$activeDropdownLinkClass => $isActive($child['route'])])>
                                                {{ $child['name'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ $pathFor($item['route']) }}" wire:navigate
                                class="relative px-4 py-2 text-sm font-medium text-dark hover:text-primary transition group"
                                @class(['text-primary' => $isActive($item['route'])])>
                                {{ $item['name'] }}
                                <span
                                    class="absolute left-4 right-4 -bottom-0.5 h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left {{ $isActive($item['route']) ? $activeUnderlineClass : '' }}"></span>
                            </a>
                        @endif
                    @endforeach

                    @foreach ($navLinks ?? [] as $link)
                        @if ($link->type === 'dropdown' && $link->children->isNotEmpty())
                            <div class="relative group">
                                <button type="button" @class([
                                    'flex items-center gap-1 px-4 py-2 text-sm font-medium text-dark hover:text-primary transition',
                                    $activeLinkClass => false,
                                ])>
                                    {{ $link->name }}
                                    <svg class="size-4 transition group-hover:rotate-180" viewBox="0 0 20 20"
                                        fill="none" aria-hidden="true">
                                        <path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-0 top-full pt-2 min-w-56 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition">
                                    <div
                                        class="bg-white rounded-xl shadow-xl border-t-2 border-primary overflow-hidden">
                                        @foreach ($link->children as $child)
                                            <a href="{{ $child->url ?? '#' }}"
                                                @if ($child->in_new_tab) target="_blank" rel="noopener noreferrer" @endif
                                                class="block px-5 py-3 text-sm text-dark hover:bg-surface hover:text-primary transition">
                                                {{ $child->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ $link->url ?? '#' }}"
                                @if ($link->in_new_tab) target="_blank" rel="noopener noreferrer" @endif
                                class="relative px-4 py-2 text-sm font-medium text-dark hover:text-primary transition">
                                {{ $link->name }}
                            </a>
                        @endif
                    @endforeach
                </nav>

                <button type="button" data-navbar-open class="lg:hidden p-2 rounded-md text-dark"
                    aria-label="Buka menu" aria-controls="site-mobile-drawer" aria-expanded="false">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div data-navbar-overlay class="hidden fixed inset-0 z-[1100] bg-dark/60 backdrop-blur-sm lg:hidden"></div>

    <aside id="site-mobile-drawer" data-navbar-drawer
        class="fixed inset-0 z-[1200] w-full translate-x-full bg-white shadow-2xl overflow-y-auto transition-transform duration-300 lg:hidden">
        <div class="p-5 flex items-center justify-between border-b border-primary-light">
            <span class="font-display text-lg text-dark">Menu</span>
            <button type="button" data-navbar-close aria-label="Tutup">
                <svg class="size-6 text-dark" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 6l12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </button>
        </div>

        <div class="p-3 flex flex-col gap-1">
            @foreach ($primaryLinks as $item)
                @if (isset($item['children']))
                    <details class="rounded-lg" data-navbar-mobile-details>
                        <summary @class([
                            'flex items-center justify-between px-4 py-3 rounded-lg text-dark font-medium hover:bg-surface cursor-pointer list-none',
                            $activeLinkClass => $hasActiveChild(array_column($item['children'], 'route')),
                        ])>
                            {{ $item['name'] }}
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </summary>
                        <div class="ml-4 border-l-2 border-primary-light pl-2 mt-1 flex flex-col">
                            @foreach ($item['children'] as $child)
                                <a href="{{ $pathFor($child['route']) }}" wire:navigate
                                    class="px-3 py-2 text-sm text-muted-foreground hover:text-primary"
                                    @class([$activeMobileLinkClass => $isActive($child['route'])])>
                                    {{ $child['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </details>
                @else
                    <a href="{{ $pathFor($item['route']) }}" wire:navigate
                        class="px-4 py-3 rounded-lg text-dark font-medium hover:bg-surface"
                        @class([$activeMobileLinkClass => $isActive($item['route'])])>
                        {{ $item['name'] }}
                    </a>
                @endif
            @endforeach

            @foreach ($navLinks ?? [] as $link)
                @if ($link->type === 'dropdown' && $link->children->isNotEmpty())
                    <details class="rounded-lg" data-navbar-mobile-details>
                        <summary @class([
                            'flex items-center justify-between px-4 py-3 rounded-lg text-dark font-medium hover:bg-surface cursor-pointer list-none',
                            $activeLinkClass => false,
                        ])>
                            {{ $link->name }}
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </summary>
                        <div class="ml-4 border-l-2 border-primary-light pl-2 mt-1 flex flex-col">
                            @foreach ($link->children as $child)
                                <a href="{{ $child->url ?? '#' }}"
                                    @if ($child->in_new_tab) target="_blank" rel="noopener noreferrer" @endif
                                    class="px-3 py-2 text-sm text-muted-foreground hover:text-primary">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    </details>
                @else
                    <a href="{{ $link->url ?? '#' }}"
                        @if ($link->in_new_tab) target="_blank" rel="noopener noreferrer" @endif
                        class="px-4 py-3 rounded-lg text-dark font-medium hover:bg-surface">
                        {{ $link->name }}
                    </a>
                @endif
            @endforeach
        </div>
    </aside>
</div>
