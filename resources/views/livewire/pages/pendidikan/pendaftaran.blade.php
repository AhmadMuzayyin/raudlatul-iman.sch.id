<div>
    <x-site.page-header title="Pendaftaran Santri Baru" subtitle="Tahun Ajaran 2026/2027" :crumbs="[['label' => 'Pendidikan'], ['label' => 'Pendaftaran']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-10">
                <div>
                    <h2 class="font-display text-3xl text-dark flex items-center gap-3">
                        <x-site.icon name="FileText" class="size-10 text-primary" />
                        Syarat Pendaftaran
                    </h2>
                    <ul class="mt-6 space-y-3">
                        @foreach ($syarat as $item)
                            <li class="flex gap-3 text-dark">
                                <x-site.icon name="CheckCircle2" class="size-5 text-primary shrink-0 mt-0.5" />
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="font-display text-3xl text-dark flex items-center gap-3">
                        <x-site.icon name="Calendar" class="size-10 text-primary" />
                        Alur Pendaftaran
                    </h2>
                    <div class="mt-6 grid sm:grid-cols-2 gap-5">
                        @foreach ($alur as $item)
                            <div class="p-6 rounded-2xl bg-surface border-l-4 border-primary">
                                <div class="font-display text-3xl text-gradient-emerald">{{ $item['step'] }}</div>
                                <h4 class="mt-2 font-display text-lg text-dark">{{ $item['title'] }}</h4>
                                <p class="text-sm text-muted-foreground mt-1">{{ $item['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <aside
                class="sticky top-28 self-start p-8 rounded-3xl bg-gradient-emerald text-white shadow-2xl shadow-primary/30">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-white/20 text-xs uppercase tracking-widest">Gelombang
                    1</span>
                <h3 class="mt-4 font-display text-2xl text-white">Pendaftaran Dibuka</h3>
                <p class="mt-2 text-white/85 text-sm">1 Januari — 30 April 2026</p>
                <div class="mt-6 space-y-3 text-sm">
                    <div class="flex gap-2"><x-site.icon name="Phone" class="size-4 mt-0.5" /> +62 812 3456 7890</div>
                </div>
                <a href="#"
                    class="mt-7 block text-center px-6 py-3 rounded-full bg-white text-primary font-medium hover:bg-surface transition">
                    Daftar Online
                </a>
                <a href="{{ url('/kontak') }}" wire:navigate
                    class="mt-3 block text-center text-sm text-white/85 hover:text-white">
                    Hubungi panitia →
                </a>
            </aside>
        </div>
    </section>
</div>
