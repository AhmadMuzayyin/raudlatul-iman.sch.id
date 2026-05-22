<div>
    <x-site.page-header title="Fasilitas" subtitle="Sarana prasarana penunjang pendidikan dan kehidupan santri."
        :crumbs="[['label' => 'Pendidikan'], ['label' => 'Fasilitas']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($fasilitas as $item)
                <div
                    class="group p-7 rounded-2xl bg-surface hover:bg-white border border-transparent hover:border-primary/30 hover:shadow-xl transition">
                    <div
                        class="size-14 rounded-2xl bg-primary-light text-primary grid place-items-center group-hover:bg-primary group-hover:text-white transition">
                        <x-site.icon :name="$item['icon']" class="size-7" />
                    </div>
                    <h3 class="mt-5 font-display text-lg text-dark">{{ $item['name'] }}</h3>
                    <p class="mt-2 text-sm text-muted-foreground">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
