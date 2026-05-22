<div>
    <x-site.page-header title="Identitas Pesantren" :crumbs="[['label' => 'Profil', 'to' => url('/profil')], ['label' => 'Identitas']]" />

    <section class="py-20 container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto bg-surface rounded-3xl overflow-hidden shadow-sm">
            <table class="w-full">
                <tbody>
                    @foreach ($data as [$key, $value])
                        <tr class="border-b border-primary-light/60 last:border-0">
                            <td class="px-6 py-4 font-medium text-dark w-1/3">{{ $key }}</td>
                            <td class="px-6 py-4 text-muted-foreground">{{ $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
