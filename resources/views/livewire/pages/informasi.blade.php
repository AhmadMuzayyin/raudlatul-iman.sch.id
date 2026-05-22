<div>
    <x-site.page-header title="Informasi" subtitle="Berita, kajian, dan kabar terbaru dari pesantren."
        :crumbs="[['label' => 'Informasi']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-[1fr_300px] gap-10">
            <div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($posts as $post)
                        <x-site.blog-card :post="$post" />
                    @empty
                        <div class="col-span-full flex justify-center py-10">
                            <section
                                class="w-full max-w-3xl rounded-[2rem] border border-border bg-white px-6 py-12 text-center shadow-[0_24px_80px_rgba(23,50,39,0.08)] sm:px-10">
                                <div
                                    class="mx-auto flex size-20 items-center justify-center rounded-full bg-primary-light text-primary">
                                    <x-site.icon name="Search" class="size-9" />
                                </div>

                                <h2
                                    class="mt-6 font-display text-3xl font-semibold tracking-tight text-dark sm:text-4xl">
                                    Tidak ada artikel ditemukan
                                </h2>
                                <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-muted-foreground sm:text-base">
                                    Coba ubah kata kunci pencarian atau pilih kategori lain untuk melihat artikel yang
                                    tersedia.
                                </p>
                            </section>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12 text-center">
                    <button type="button"
                        class="px-7 py-3 rounded-full bg-primary text-primary-foreground hover:bg-primary-dark transition">
                        Muat Lebih Banyak
                    </button>
                </div>
            </div>

            <aside class="space-y-8">
                <div>
                    <h4 class="font-display text-lg text-dark mb-3">Pencarian</h4>
                    <div class="relative">
                        <x-site.icon name="Search"
                            class="absolute left-4 top-1/2 -translate-y-1/2 size-4 text-muted-foreground" />
                        <input wire:model.live.debounce.300ms="search" placeholder="Cari artikel..."
                            class="w-full pl-11 pr-4 py-3 rounded-full bg-surface border border-transparent focus:border-primary focus:bg-white outline-none transition">
                    </div>
                </div>

                <div>
                    <h4 class="font-display text-lg text-dark mb-3">Kategori</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($categories as $item)
                            <button type="button" wire:click="setCategory('{{ $item }}')"
                                class="px-3 py-1.5 rounded-full text-sm transition {{ $category === $item ? 'bg-primary text-primary-foreground' : 'bg-surface text-dark hover:bg-primary-light' }}">
                                {{ $item }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="font-display text-lg text-dark mb-3">Artikel Terbaru</h4>
                    <ul class="space-y-3">
                        @foreach ($latestPosts as $post)
                            <li class="flex gap-3 group cursor-pointer">
                                <img src="{{ $post['image'] }}" alt=""
                                    class="size-16 rounded-lg object-cover shrink-0">
                                <div>
                                    <div class="text-xs text-muted-foreground">{{ $post['date'] }}</div>
                                    <div
                                        class="text-sm font-medium text-dark line-clamp-2 group-hover:text-primary transition">
                                        {{ $post['title'] }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</div>
