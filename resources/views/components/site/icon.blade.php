@props(['name'])

@php
    $svg = match ($name) {
        'ArrowRight'
            => '<path d="m7.5 5.5 5 4.5-5 4.5M8.5 10h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Award'
            => '<path d="M12 15.5 9 17l.7-3.3-2.5-2.3 3.4-.3L12 8l1.4 3.1 3.4.3-2.5 2.3.7 3.3L12 15.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>',
        'Calendar'
            => '<path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'BookOpen'
            => '<path d="M12 5.5c-2-1.2-4.4-1.7-7-1.7v13c2.6 0 5 .5 7 1.7m0-13c2-1.2 4.4-1.7 7-1.7v13c-2.6 0-5 .5-7 1.7m0-13v13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Building'
            => '<path d="M5 20V6h14v14M8 20v-4h3v4m2 0v-4h3v4M7 6V4h10v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'CheckCircle2'
            => '<path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>',
        'Clock'
            => '<path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>',
        'Compass'
            => '<path d="m14 10-2 5-2-2-2 2 2-5 2 2 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/>',
        'Dumbbell'
            => '<path d="M4 9v6M7 8v8M17 8v8M20 9v6M7 12h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Eye'
            => '<path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="1.8"/>',
        'FileText'
            => '<path d="M8 3.5h5l4 4V20H8V3.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M13 3.5V8h4.5M10 11h4M10 14h4M10 17h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
        'Globe'
            => '<circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/><path d="M4 12h16M12 4c2.5 2.5 4 5 4 8s-1.5 5.5-4 8c-2.5-2.5-4-5-4-8s1.5-5.5 4-8Z" stroke="currentColor" stroke-width="1.8"/>',
        'GraduationCap'
            => '<path d="M3 10.5 12 5l9 5.5-9 5.5-9-5.5Zm4 2V17c0 .8 2 2 5 2s5-1.2 5-2v-4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Heart'
            => '<path d="M12 20s-7-4.5-7-11a4.5 4.5 0 0 1 8-2.7A4.5 4.5 0 0 1 19 9c0 6.5-7 11-7 11Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        'History'
            => '<path d="M4 6h8a4 4 0 1 1 0 8H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 10 4 14l4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Home'
            => '<path d="M3 11.5 12 4l9 7.5M5 10.5V20h14v-9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Mail'
            => '<path d="m4 7 8 6 8-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'MapPin'
            => '<path d="M12 21s6-4.6 6-11a6 6 0 1 0-12 0c0 6.4 6 11 6 11Z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="1.8"/>',
        'Mic'
            => '<path d="M12 15v4M9 8v4a3 3 0 0 0 6 0V8a3 3 0 0 0-6 0Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 12a7 7 0 0 0 14 0M12 19v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Network'
            => '<circle cx="6" cy="7" r="2" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="7" r="2" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="17" r="2" stroke="currentColor" stroke-width="1.8"/><path d="M7.6 8.4 10.8 15M16.4 8.4 13.2 15M8 7h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'PenTool'
            => '<path d="m14 4 6 6-8 8H6v-6L14 4Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M11 7 17 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
        'Phone'
            => '<path d="M4 5.5A2.5 2.5 0 0 1 6.5 3h1.8c.7 0 1.3.4 1.6 1l1.3 3.1c.3.7.1 1.5-.4 2l-1.1 1.1a15.2 15.2 0 0 0 6.2 6.2l1.1-1.1c.5-.5 1.3-.7 2-.4l3.1 1.3c.6.3 1 .9 1 1.6v1.8A2.5 2.5 0 0 1 19.5 21h-1C8.2 21 3 15.8 3 7.5v-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        'Quote'
            => '<path d="M8 6H4v6h4V6Zm12 0h-4v6h4V6ZM8 12c0 4-2 6-4 6v2c4 0 8-3 8-8V4H8v8Zm12 0c0 4-2 6-4 6v2c4 0 8-3 8-8V4h-4v8Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Search'
            => '<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.8"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>',
        'Send'
            => '<path d="M21 3 10 14M21 3l-7 18-4-8-8-4 19-6Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Sparkles'
            => '<path d="m12 3 1.2 4.2L17 8.5l-3.8 1.3L12 14l-1.2-4.2L7 8.5l3.8-1.3L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="m5 14 1 3 3 1-3 1-1 3-1-3-3-1 3-1 1-3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        'Stethoscope'
            => '<path d="M6 6v4a6 6 0 0 0 12 0V6M6 6a2 2 0 1 1 4 0v2M18 6a2 2 0 1 0-4 0v2M12 16v2a4 4 0 0 0 8 0v-2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Target'
            => '<circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/>',
        'Trees'
            => '<path d="M7 20h10M12 4l-4 6h3l-3 5h8l-3-5h3l-4-6Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>',
        'Utensils'
            => '<path d="M5 3v8M5 3c2 0 3 2 3 4v4M9 3v16M15 3v8m0 0c0 2 1.5 3 3 3V3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Users'
            => '<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6M16 10a3 3 0 1 0 0-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        'Wifi'
            => '<path d="M2.5 8.5a16 16 0 0 1 19 0M6 12a10 10 0 0 1 12 0M9.5 15.5a4.8 4.8 0 0 1 5 0M12 19h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        '404' => '',
        'Maintenance' => '',
        default => '',
    };
@endphp

<svg {{ $attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'aria-hidden' => 'true']) }}>
    {!! $svg !!}
</svg>
