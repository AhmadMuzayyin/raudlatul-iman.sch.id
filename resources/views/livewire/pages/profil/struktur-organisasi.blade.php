<div>
    <x-site.page-header title="Struktur Organisasi" :crumbs="[['label' => 'Profil', 'to' => url('/profil')], ['label' => 'Struktur Organisasi']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($struktur as $item)
                <div class="group text-center">
                    <div class="relative aspect-square overflow-hidden rounded-3xl">
                        <img src="{{ asset('storage' . '/' . $item['photo']) }}" alt="{{ $item['name'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition">
                        </div>
                    </div>
                    <h3 class="mt-5 font-display text-xl text-dark">{{ $item['name'] }}</h3>
                    <p class="text-primary text-sm">{{ $item['jabatan'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
