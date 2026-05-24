@php
    $title = $title ?? 'Sedang dalam pemeliharaan';
    $message = $message ?? 'Situs sedang diperbarui untuk peningkatan layanan. Silakan coba lagi beberapa saat lagi.';
    $supportEmail = $supportEmail ?? ($settings?->contact_email ?? config('mail.from.address'));
    $supportPhone = $supportPhone ?? ($settings?->contact_phone ?? null);
@endphp

<div class="flex min-h-screen items-center justify-center bg-background px-4 py-12">
    <section
        class="w-full max-w-3xl rounded-[2rem] border border-border bg-white px-6 py-12 text-center shadow-[0_24px_80px_rgba(23,50,39,0.08)] sm:px-10">
        <div class="mx-auto flex size-20 items-center justify-center rounded-full bg-primary-light text-primary">
            <img src="/storage/maintenance.svg" class="size-100" alt="maintenance image" />
        </div>

        <p class="mt-6 text-xs font-semibold uppercase tracking-[0.35em] text-primary">Maintenance</p>
        <h1 class="mt-4 font-display text-3xl font-semibold tracking-tight text-dark sm:text-4xl">
            {{ $title }}
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-dark/70 sm:text-base">
            {{ $message }}
        </p>

        <div class="mt-8 flex flex-col items-center justify-center gap-3 text-sm text-dark sm:flex-row sm:flex-wrap">
            @if ($supportEmail)
                <a href="mailto:{{ $supportEmail }}"
                    class="inline-flex items-center gap-2 rounded-full bg-surface px-5 py-3 transition hover:text-primary">
                    <x-site.icon name="Mail" class="size-4" />
                    <span>{{ $supportEmail }}</span>
                </a>
            @endif

            @if ($supportPhone)
                <a href="tel:{{ $supportPhone }}"
                    class="inline-flex items-center gap-2 rounded-full bg-surface px-5 py-3 transition hover:text-primary">
                    <x-site.icon name="Phone" class="size-4" />
                    <span>{{ $supportPhone }}</span>
                </a>
            @endif
        </div>
    </section>
</div>
