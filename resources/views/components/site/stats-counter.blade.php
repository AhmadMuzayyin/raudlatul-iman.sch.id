@props(['value', 'label', 'suffix' => ''])

<div data-stats-counter data-value="{{ $value }}" data-suffix="{{ $suffix }}" class="text-center">
    <div class="font-display text-5xl md:text-6xl text-white">
        <span data-counter-value>0{{ $suffix }}</span>
    </div>
    <div class="mt-2 text-sm uppercase tracking-widest text-white/70">{{ $label }}</div>
</div>