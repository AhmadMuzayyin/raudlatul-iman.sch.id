<div class="bg-white">
    <section class="container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-[1fr_300px] gap-10">
            <div class="max-w-4xl mx-auto lg:mx-0 overflow-hidden">
                <div class="p-8 md:p-12">
                    {{-- Converted inline styles to Tailwind classes --}}
                    <h1 class="font-display text-4xl md:text-4xl text-dark">{{ $post->title }}</h1>

                    <div class="mt-2 flex flex-wrap items-center gap-3">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary-light text-primary-dark text-xs">
                            <span class="inline-block w-4 h-4">{{ svg('bi-person-fill') }}</span>
                            {{ $post->author->name }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary-light text-primary-dark text-xs">
                            <span class="inline-block w-4 h-4">{{ svg('bi-tag') }}</span>
                            {{ $post->category?->name ?? 'Informasi' }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary-light text-primary-dark text-xs">
                            <span class="inline-block w-4 h-4">{{ svg('bi-calendar3') }}</span>
                            {{ $post->created_at?->translatedFormat('d M Y') }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary-light text-primary-dark text-xs">
                            <span class="inline-block w-4 h-4">{{ svg('bi-building') }}</span>
                            {{ $post->institution?->name }}
                        </span>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-primary-light text-primary-dark text-xs">
                            <span class="inline-block w-4 h-4">{{ svg('bi-eye') }}</span>
                            {{ $post->views_count }}x dilihat
                        </span>
                    </div>


                    <article
                        class="prose prose-lg max-w-none mt-8 prose-headings:font-display prose-headings:text-dark prose-a:text-primary prose-strong:text-dark">
                        {!! $post->content !!}
                    </article>

                    @if ($post->tags->isNotEmpty())
                        <div class="mt-8 flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <span
                                    class="px-3 py-1 rounded-full bg-surface text-sm text-dark">#{{ $tag->tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    @php
                        $shareUrlRaw = url()->current();
                        $shareTextRaw = $post->title;
                        $shareUrl = urlencode($shareUrlRaw);
                        $shareText = urlencode($shareTextRaw);
                        $instagramLink = 'https://www.instagram.com/';
                        $facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrlRaw);
                        $waLink = 'https://wa.me/?text=' . urlencode("{$shareTextRaw} {$shareUrlRaw}");
                        $telegramLink =
                            'https://t.me/share/url?url=' .
                            urlencode($shareUrlRaw) .
                            '&text=' .
                            urlencode($shareTextRaw);
                    @endphp

                    <hr class="my-2 border-border" />
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        Bagikan ke:
                        <div class="flex flex-wrap">
                            <a href="{{ $instagramLink }}"
                                onclick="window.open({{ json_encode($instagramLink) }}, '_blank', 'noopener,noreferrer,width=900,height=700'); return false;"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-1 text-sm font-medium text-dark transform duration-150 hover:-translate-y-1">
                                <span class="text-sm">{{ svg('bi-instagram') }}</span>
                                <span class="sr-only">Instagram</span>
                            </a>
                            <a href="{{ $facebookLink }}"
                                onclick="window.open({{ json_encode($facebookLink) }}, '_blank', 'noopener,noreferrer,width=900,height=700'); return false;"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-1 text-sm font-medium text-dark transform duration-150 hover:-translate-y-1">
                                <span class="text-sm">{{ svg('bi-facebook') }}</span>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="{{ $waLink }}"
                                onclick="window.open({{ json_encode($waLink) }}, '_blank', 'noopener,noreferrer,width=600,height=700'); return false;"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-1 text-sm font-medium text-dark transform duration-150 hover:-translate-y-1">
                                <span class="text-sm">{{ svg('bi-whatsapp') }}</span>
                                <span class="sr-only">WhatsApp</span>
                            </a>
                            <a href="{{ $telegramLink }}"
                                onclick="window.open({{ json_encode($telegramLink) }}, '_blank', 'noopener,noreferrer,width=600,height=700'); return false;"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-1 text-sm font-medium text-dark transform duration-150 hover:-translate-y-1">
                                <span class="text-sm">{{ svg('bi-telegram') }}</span>
                                <span class="sr-only">Telegram</span>
                            </a>
                        </div>
                    </div>

                    @if ($settings->enable_comments)
                        <div class="mt-8 rounded-3xl border border-border bg-white p-5 md:p-6">
                            <h2 class="font-display text-2xl text-dark">Komentar</h2>
                            <p class="mt-1 text-sm text-muted-foreground">Komentar tersedia untuk pengguna yang sudah
                                login.
                            </p>

                            @auth
                                <form class="mt-5 space-y-4">
                                    <textarea rows="5"
                                        class="w-full rounded-2xl border border-border bg-surface/70 px-4 py-3 text-sm text-dark outline-none transition focus:border-primary focus:bg-white"
                                        placeholder="Tulis komentar Anda..."></textarea>
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-medium text-primary-foreground transition hover:bg-primary-dark">
                                        Kirim Komentar
                                    </button>
                                </form>
                            @else
                                <div
                                    class="mt-5 rounded-2xl border border-dashed border-border bg-surface/60 p-5 text-sm text-dark/80">
                                    Untuk menulis komentar, silakan login terlebih dahulu. Kita bahas fitur kirim komentar
                                    berikutnya.
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

            <x-site.informasi-sidebar :search-visible="false" :categories="$categories" :popular-posts="$popularPosts" :latest-posts="$latestPosts" />
        </div>
    </section>
</div>
