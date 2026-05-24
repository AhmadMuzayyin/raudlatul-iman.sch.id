<footer class="relative bg-dark text-white/80 overflow-hidden">
    <div class="absolute inset-0 noise opacity-30 pointer-events-none"></div>
    <div class="absolute -top-32 -left-32 size-96 bg-primary/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -right-32 size-96 bg-accent/10 rounded-full blur-3xl"></div>

    <div class="relative container mx-auto px-4 lg:px-8 py-16">
        <div class="grid lg:grid-cols-4 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ $settings->logo }}" alt="{{ $settings->logo }} logo"
                        class="size-11 rounded-full bg-gradient-emerald grid place-items-center text-white font-display text-xl shadow-lg shadow-primary/30 group-hover:scale-105 transition">
                    <div>
                        <div class="font-display text-lg text-white">Raudlatul Iman</div>
                        <div class="text-xs text-white/60 uppercase tracking-widest">Pondok Pesantren</div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-white/70">
                    {{ $settings?->meta_description ?? 'Mencetak generasi qur\'ani yang berakhlak mulia, berilmu, dan bermanfaat bagi umat dan bangsa.' }}
                </p>
            </div>

            <div>
                <h4 class="text-white font-display text-lg mb-4">Tautan</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/profil') }}" wire:navigate class="hover:text-primary-light">Profil</a></li>
                    <li><a href="{{ url('/pendidikan/pendaftaran') }}" wire:navigate
                            class="hover:text-primary-light">Pendaftaran</a></li>
                    <li><a href="{{ url('/agenda') }}" wire:navigate class="hover:text-primary-light">Agenda</a></li>
                    <li><a href="{{ url('/informasi') }}" wire:navigate class="hover:text-primary-light">Informasi</a>
                    </li>
                    <li><a href="{{ url('/kontak') }}" wire:navigate class="hover:text-primary-light">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-display text-lg mb-4">Kontak</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex gap-3">
                        <svg class="size-4 text-primary-light shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true">
                            <path d="M12 21s6-4.6 6-11a6 6 0 1 0-12 0c0 6.4 6 11 6 11Z" stroke="currentColor"
                                stroke-width="1.8" />
                            <circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="1.8" />
                        </svg>
                        <span>Jl. Pesantren No. 123, Indonesia</span>
                    </li>
                    <li class="flex gap-3">
                        <svg class="size-4 text-primary-light shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true">
                            <path
                                d="M4 5.5A2.5 2.5 0 0 1 6.5 3h1.8c.7 0 1.3.4 1.6 1l1.3 3.1c.3.7.1 1.5-.4 2l-1.1 1.1a15.2 15.2 0 0 0 6.2 6.2l1.1-1.1c.5-.5 1.3-.7 2-.4l3.1 1.3c.6.3 1 .9 1 1.6v1.8A2.5 2.5 0 0 1 19.5 21h-1C8.2 21 3 15.8 3 7.5v-2Z"
                                stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                        </svg>
                        <span>{{ $settings?->contact_phone ?? '+62 812 3456 7890' }}</span>
                    </li>
                    <li class="flex gap-3">
                        <svg class="size-4 text-primary-light shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none"
                            aria-hidden="true">
                            <path
                                d="m4 7 8 6 8-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span>{{ $settings?->contact_email ?? 'info@raudlatuliman.id' }}</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-display text-lg mb-4">Ikuti Kami</h4>
                <div class="flex gap-3">
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        class="size-10 rounded-full glass grid place-items-center hover:bg-primary hover:border-primary transition"
                        aria-label="facebook">
                        <span class="text-xs">{{ svg('bi-facebook') }}</span>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        class="size-10 rounded-full glass grid place-items-center hover:bg-primary hover:border-primary transition"
                        aria-label="instagram">
                        <span class="text-xs">{{ svg('bi-instagram') }}</span>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer"
                        class="size-10 rounded-full glass grid place-items-center hover:bg-primary hover:border-primary transition"
                        aria-label="youtube">
                        <span class="text-xs">{{ svg('bi-youtube') }}</span>
                    </a>
                </div>
                <div class="mt-6 text-xs text-white/50">
                    <a href="{{ url('/privacy-policy') }}" wire:navigate class="hover:text-primary-light">
                        Privacy Policy
                    </a>
                    <span class="mx-2">|</span>
                    <a href="{{ url('/terms-of-service') }}" wire:navigate class="hover:text-primary-light">
                        Terms of Service
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-white/10 text-center text-xs text-white/50">
            © 2026 Pondok Pesantren Raudlatul Iman. All rights reserved.
        </div>


    </div>
</footer>
