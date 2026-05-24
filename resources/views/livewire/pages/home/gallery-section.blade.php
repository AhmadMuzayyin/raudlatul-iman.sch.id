<div>
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
                        <img alt="Momen di Pesantren - {{ $loop->iteration }}" src="{{ $image }}" loading="lazy"
                            decoding="async" class="w-full h-auto">
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
</div>
