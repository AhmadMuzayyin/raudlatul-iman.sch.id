@props(['seo'])
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? ($title ?? config('app.name')) }}</title>
    <link rel="icon" href="{{ $settings->favicon }}">

    @if (request()->routeIs('home'))
        <meta name="description" content="{{ $settings?->meta_description ?? config('app.name') }}">
        <meta name="keywords" content="{{ $settings?->meta_keywords ?? '' }}">
        <meta property="og:title" content="{{ $pageTitle ?? ($title ?? config('app.name')) }}" />
        <meta property="og:description" content="{{ $settings?->meta_description }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="{{ $settings?->site_name ?? config('app.name') }}" />
        <meta property="og:image" content="{{ $settings->og_image }}" />
        <meta property="robots" content="index,follow" />
    @elseif(request()->routeIs('informasi.show') && isset($seo))
        <meta name="description" content="{{ $seo->description ?? '' }}">
        <meta name="keywords" content="{{ $seo->keywords ?? '' }}">
        <meta property="og:title" content="{{ $seo->title ?? '' }}" />
        <meta property="og:description" content="{{ $seo->description ?? '' }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="{{ $settings?->site_name ?? config('app.name') }}" />
        <meta property="og:image" content="{{ $settings->og_image }}" />
        <meta property="robots" content="index,follow" />
    @endif
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="533" />
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-background text-dark">
    <x-site.navbar />

    <main>
        {{ $slot }}
    </main>

    <x-site.footer />

    @livewireScripts
    @stack('scripts')
</body>

</html>
