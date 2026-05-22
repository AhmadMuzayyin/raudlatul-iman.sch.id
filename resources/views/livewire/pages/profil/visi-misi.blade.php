<div>
    <x-site.page-header title="Visi & Misi" :crumbs="[['label' => 'Profil', 'to' => url('/profil')], ['label' => 'Visi & Misi']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8 grid lg:grid-cols-2 gap-10">
        <div class="relative p-10 rounded-3xl bg-gradient-emerald text-white overflow-hidden">
            <div class="absolute -top-10 -right-10 size-40 bg-white/10 rounded-full blur-2xl"></div>
            <x-site.icon name="Target" class="size-12" />
            <h2 class="mt-6 font-display text-3xl">Visi</h2>
            <p class="mt-4 text-white/90 leading-relaxed text-lg">{{ $vision }}</p>
        </div>

        <div class="p-10 rounded-3xl bg-surface">
            <x-site.icon name="Compass" class="size-12 text-primary" />
            <h2 class="mt-6 font-display text-3xl text-dark">Misi</h2>
            <ul class="mt-6 space-y-4">
                @foreach ($mission as $item)
                    <li class="flex gap-3 text-dark">
                        <x-site.icon name="CheckCircle2" class="size-5 text-primary shrink-0 mt-0.5" />
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
