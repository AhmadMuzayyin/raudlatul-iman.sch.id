<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman tidak ditemukan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background text-dark">
    @include('livewire.utilities.404', [
        'title' => 'Halaman tidak ditemukan',
        'message' =>
            'Alamat yang Anda buka tidak tersedia. Kembali ke beranda atau buka halaman informasi untuk mencari konten lain.',
        'primaryLabel' => 'Ke Beranda',
        'primaryHref' => url('/'),
        'secondaryLabel' => 'Ke Informasi',
        'secondaryHref' => url('/informasi'),
    ])
</body>

</html>
