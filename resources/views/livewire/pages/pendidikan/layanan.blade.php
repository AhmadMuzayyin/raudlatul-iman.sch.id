<div>
    <x-site.page-header title="Layanan Pendidikan" subtitle="Beragam program untuk pertumbuhan ilmu, iman, dan akhlak."
        :crumbs="[['label' => 'Pendidikan'], ['label' => 'Layanan']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($layanan as $item)
                <div
                    class="group relative p-8 rounded-3xl bg-white border border-primary-light/60 hover:border-primary hover:shadow-2xl transition overflow-hidden">
                    <div
                        class="absolute -top-12 -right-12 size-32 bg-primary-light rounded-full opacity-0 group-hover:opacity-100 transition">
                    </div>
                    <div class="relative">
                        <div
                            class="size-14 rounded-2xl bg-gradient-emerald grid place-items-center text-white shadow-lg shadow-primary/30">
                            <x-site.icon :name="$item['icon']" class="size-7" />
                        </div>
                        <h3 class="mt-6 font-display text-2xl text-dark">{{ $item['name'] }}</h3>
                        <p class="mt-3 text-muted-foreground">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
