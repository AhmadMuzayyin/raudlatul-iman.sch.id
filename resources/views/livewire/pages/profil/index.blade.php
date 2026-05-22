<div>
    <x-site.page-header title="Profil Pesantren" subtitle="Mengenal lebih dekat Pondok Pesantren Raudlatul Iman."
        :crumbs="[['label' => 'Profil']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-lg text-muted-foreground leading-relaxed">
                Pondok Pesantren Raudlatul Iman berdiri sebagai taman keimanan, tempat para santri menempa diri menjadi
                insan yang berilmu, beriman, dan berakhlak mulia. Berakar pada tradisi salafiyah, terbuka pada kemajuan
                zaman.
            </p>
        </div>

        <div class="mt-14 grid md:grid-cols-2 gap-6">
            @foreach ($sections as $section)
                <a href="{{ $section['to'] }}" wire:navigate
                    class="group relative p-8 rounded-3xl bg-surface hover:bg-white border border-transparent hover:border-primary/30 shadow-sm hover:shadow-2xl transition">
                    <div
                        class="size-12 rounded-2xl bg-primary-light text-primary grid place-items-center group-hover:bg-primary group-hover:text-white transition">
                        <x-site.icon :name="$section['icon']" class="size-6" />
                    </div>
                    <h3 class="mt-5 font-display text-2xl text-dark">{{ $section['name'] }}</h3>
                    <p class="mt-2 text-muted-foreground">{{ $section['desc'] }}</p>
                    <x-site.icon name="ArrowRight"
                        class="absolute top-8 right-8 size-5 text-primary opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition" />
                </a>
            @endforeach
        </div>
    </section>
</div>
