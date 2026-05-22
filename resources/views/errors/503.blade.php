<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>503 - Maintenance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background text-dark">
    @include('livewire.utilities.maintenance', [
        'title' => 'Situs sedang dalam pemeliharaan',
        'message' =>
            'Kami sedang melakukan pembaruan sistem agar layanan tetap stabil dan lebih baik. Silakan kembali beberapa saat lagi.',
        'settings' => $settings ?? null,
    ])
</body>

</html>
