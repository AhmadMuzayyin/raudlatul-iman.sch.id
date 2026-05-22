<div>
    <x-site.carousel :slides="$slides" />

    <section class="py-24 bg-surface">
        <div class="container mx-auto px-4 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Selamat
                    Datang</span>
                <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">
                    Menyemai <span class="text-gradient-emerald">Ilmu</span>, Merawat Iman
                </h2>
                <p class="mt-5 text-muted-foreground leading-relaxed">
                    Pondok Pesantren Raudlatul Iman hadir sebagai taman keimanan tempat para santri menumbuhkan
                    kecintaan terhadap Al-Qur'an, ilmu pengetahuan, dan akhlak mulia. Di tengah modernitas, kami menjaga
                    nilai-nilai salafiyah yang menjadi warisan para ulama.
                </p>
                <blockquote class="mt-8 pl-6 border-l-4 border-primary italic text-dark/80">
                    <x-site.icon name="Quote" class="size-6 text-primary mb-2" />
                    "Sebaik-baik kalian adalah yang mempelajari Al-Qur'an dan mengajarkannya."
                    <footer class="mt-3 not-italic text-sm text-muted-foreground">— KH. Pimpinan Pesantren</footer>
                </blockquote>
                <a href="{{ url('/profil') }}" wire:navigate
                    class="mt-8 inline-flex items-center gap-2 text-primary font-medium hover:gap-3 transition-all">
                    Tentang Pesantren
                    <x-site.icon name="ArrowRight" class="size-4" />
                </a>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-emerald rounded-3xl blur-2xl opacity-20"></div>
                <img src="https://picsum.photos/seed/welcome/900/1000" alt="Pesantren"
                    class="relative rounded-3xl shadow-2xl ring-4 ring-primary/20 w-full h-[500px] object-cover">
                <div class="absolute -bottom-6 -left-6 glass rounded-2xl p-5 max-w-xs">
                    <div class="font-display text-2xl text-dark">25+ Tahun</div>
                    <div class="text-xs text-muted-foreground mt-1">Mendidik generasi qur'ani sejak 2000</div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-20 bg-gradient-emerald-deep overflow-hidden">
        <div class="absolute inset-0 noise opacity-40"></div>
        <div class="absolute -top-32 -right-32 size-96 bg-accent/20 rounded-full blur-3xl"></div>
        <div class="relative container mx-auto px-4 lg:px-8 grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($stats as $stat)
                <x-site.stats-counter :value="$stat['value']" :label="$stat['label']" :suffix="$stat['suffix']" />
            @endforeach
        </div>
    </section>

    <section class="py-24 bg-background">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Program
                    Unggulan</span>
                <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">
                    Pendidikan <span class="text-gradient-emerald">Terpadu</span> & Berakar
                </h2>
                <p class="mt-4 text-muted-foreground">Memadukan tradisi keilmuan salaf dengan pendekatan modern.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 stack-group">
                @foreach ($programs as $program)
                    <div
                        class="stack-card relative rounded-3xl p-8 text-white overflow-hidden {{ $loop->iteration === 2 ? 'bg-gradient-to-br from-primary to-primary-dark lg:-mt-6 lg:mb-6 shadow-2xl shadow-primary/40 z-10' : ($loop->first ? 'bg-gradient-to-br from-primary-dark to-dark lg:mt-4' : 'bg-gradient-to-br from-accent to-primary lg:mt-4') }}">
                        <div class="absolute -top-10 -right-10 size-40 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="relative">
                            <div class="size-14 rounded-2xl glass grid place-items-center">
                                <x-site.icon :name="$program['icon']" class="size-7 text-white" />
                            </div>
                            <span
                                class="mt-6 inline-block px-3 py-1 rounded-full bg-white/15 backdrop-blur text-xs uppercase tracking-wider">
                                {{ $program['level'] }}
                            </span>
                            <h3 class="mt-3 font-display text-2xl text-white">
                                {{ $program['name'] }}
                            </h3>
                            <p class="mt-3 text-sm text-white/80 leading-relaxed">
                                {{ $program['desc'] }}
                            </p>
                            <a href="{{ url('/pendidikan/layanan') }}" wire:navigate
                                class="mt-6 inline-flex items-center gap-2 text-sm font-medium hover:gap-3 transition-all">
                                Selengkapnya
                                <x-site.icon name="ArrowRight" class="size-4" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 bg-surface">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-end justify-between mb-12 flex-wrap gap-4">
                <div>
                    <span
                        class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Terbaru</span>
                    <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">Pengumuman & Agenda</h2>
                </div>
                <a href="{{ url('/agenda') }}" wire:navigate
                    class="text-primary font-medium inline-flex items-center gap-2 hover:gap-3 transition-all">
                    Semua agenda
                    <x-site.icon name="ArrowRight" class="size-4" />
                </a>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <article
                    class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition border border-transparent hover:border-primary/30">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="{{ $announcements[0]['image'] }}" alt=""
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span
                            class="absolute top-5 left-5 px-3 py-1.5 rounded-full bg-primary text-primary-foreground text-xs font-medium inline-flex items-center gap-1.5">
                            <x-site.icon name="Calendar" class="size-3" />
                            {{ $announcements[0]['date'] }}
                        </span>
                    </div>
                    <div class="p-8">
                        <h3 class="font-display text-2xl md:text-3xl text-dark group-hover:text-primary transition">
                            {{ $announcements[0]['title'] }}</h3>
                        <p class="mt-3 text-muted-foreground">{{ $announcements[0]['excerpt'] }}</p>
                    </div>
                </article>

                <div class="space-y-5">
                    @foreach (array_slice($announcements, 1) as $announcement)
                        <article
                            class="group flex gap-5 bg-white rounded-2xl p-5 shadow-sm hover:shadow-xl transition border border-transparent hover:border-primary/30">
                            <img src="{{ $announcement['image'] }}" alt=""
                                class="size-28 rounded-xl object-cover shrink-0">
                            <div class="flex-1">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary-light text-primary-dark text-xs">
                                    <x-site.icon name="Calendar" class="size-3" />
                                    {{ $announcement['date'] }}
                                </span>
                                <h4
                                    class="mt-2 font-display text-lg text-dark group-hover:text-primary transition line-clamp-2">
                                    {{ $announcement['title'] }}</h4>
                                <p class="text-sm text-muted-foreground line-clamp-1 mt-1">
                                    {{ $announcement['excerpt'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-background">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span
                    class="inline-block px-3 py-1 rounded-full bg-primary-light text-primary-dark text-xs uppercase tracking-widest">Galeri</span>
                <h2 class="mt-5 font-display text-4xl md:text-5xl text-dark">Momen di <span
                        class="text-gradient-emerald">Pesantren</span></h2>
            </div>

            <div class="columns-2 md:columns-3 gap-4 blur-siblings">
                @foreach ($galleryImages as $image)
                    <div
                        class="gallery-item relative mb-4 break-inside-avoid rounded-2xl overflow-hidden group cursor-pointer">
                        <img src="{{ $image }}" alt="" class="w-full h-auto">
                        <div
                            class="absolute inset-0 bg-dark/0 group-hover:bg-dark/60 grid place-items-center transition">
                            <x-site.icon name="Search"
                                class="size-8 text-white opacity-0 group-hover:opacity-100 transition" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-site.testimonial-carousel :testimonials="$testimonials" />

    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-emerald"></div>
        <div class="absolute inset-0 noise opacity-40"></div>
        <div class="absolute -top-32 -left-32 size-96 bg-accent/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 size-96 bg-white/10 rounded-full blur-3xl"></div>
        <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <x-site.icon name="Users" class="size-12 text-white/80 mx-auto" />
            <h2 class="mt-6 font-display text-4xl md:text-6xl text-white">Bergabunglah Bersama Kami</h2>
            <p class="mt-5 text-lg text-white/85">
                Pendaftaran santri baru tahun ajaran 2026/2027 telah dibuka. Daftarkan putra-putri Anda untuk menjadi
                bagian dari keluarga besar pesantren.
            </p>
            <div class="mt-9 flex flex-wrap justify-center gap-4">
                <a href="{{ url('/pendidikan/pendaftaran') }}" wire:navigate
                    class="px-8 py-3.5 rounded-full bg-white text-primary font-medium hover:bg-surface transition shadow-xl">
                    Daftar Sekarang
                </a>
                <a href="{{ url('/profil') }}" wire:navigate
                    class="px-8 py-3.5 rounded-full glass text-white font-medium hover:bg-white/20 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>
</div>
