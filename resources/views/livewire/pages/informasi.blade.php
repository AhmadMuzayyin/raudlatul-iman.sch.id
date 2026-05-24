<div>
    <x-site.page-header title="Informasi" subtitle="Berita, dan kabar terbaru dari pesantren." :crumbs="[['label' => 'Informasi']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8 bg-white">
        <div class="grid lg:grid-cols-[1fr_300px] gap-10">
            <div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($posts as $post)
                        <x-site.blog-card :post="$post" wire:key="post-card-{{ data_get($post, 'slug') }}" />
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

            <x-site.informasi-sidebar :search-visible="true" :active-category="$category" :categories="$categories" :popular-posts="$popularPosts"
                :latest-posts="$latestPosts" />
        </div>
    </section>
</div>
