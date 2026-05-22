@php
    $title = $title ?? 'Halaman tidak ditemukan';
    $message = $message ?? 'Halaman yang Anda cari tidak tersedia, sudah dipindahkan, atau belum dipublikasikan.';
    $primaryLabel = $primaryLabel ?? 'Kembali ke Beranda';
    $primaryHref = $primaryHref ?? url('/');
    $secondaryLabel = $secondaryLabel ?? 'Lihat Informasi';
    $secondaryHref = $secondaryHref ?? url('/informasi');
@endphp

<div class="col-span-full flex justify-center py-10">
    <section
        class="w-full max-w-3xl rounded-[2rem] border border-border bg-white px-6 py-12 text-center shadow-[0_24px_80px_rgba(23,50,39,0.08)] sm:px-10">
        <div class="mx-auto flex size-20 items-center justify-center rounded-full bg-primary-light text-primary">
            <img src="/storage/404.svg" class="size-100" />
        </div>

        <p class="mt-6 text-xs font-semibold uppercase tracking-[0.35em] text-primary">404</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-dark sm:text-4xl">
            {{ $title }}
        </h2>
        <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-muted-foreground sm:text-base">
            {{ $message }}
        </p>

        <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
            <a href="{{ $primaryHref }}"
                class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-semibold text-primary-foreground transition hover:bg-primary-dark">
                {{ $primaryLabel }}
            </a>
            <a href="{{ $secondaryHref }}"
                class="inline-flex items-center justify-center rounded-full border border-border bg-white px-6 py-3 text-sm font-semibold text-dark transition hover:border-primary hover:text-primary">
                {{ $secondaryLabel }}
            </a>
        </div>
    </section>
</div>
