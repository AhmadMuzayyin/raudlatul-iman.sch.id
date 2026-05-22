<?php

namespace App\Livewire\Pages\Profil;

use App\Models\Institution;
use App\Models\Setting;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Identitas — Pondok Pesantren Raudlatul Iman')]
class Identitas extends Component
{
    public function render(): View
    {
        $institution = Institution::query()->orderBy('id', 'asc')->first();
        $settings = Setting::query()->first();

        return view('livewire.pages.profil.identitas', [
            'data' => [
                ['Nama Lembaga', $institution?->name ?? 'Pondok Pesantren Raudlatul Iman'],
                ['NSPP', '510032010001'],
                ['Tahun Berdiri', '2000'],
                ['Pendiri', 'KH. Ahmad Fauzi'],
                ['Pengasuh', 'KH. Muhammad Yusuf'],
                ['Alamat', 'Jl. Pesantren No. 123, Kab. Sejahtera'],
                ['Telepon', $settings?->contact_phone ?? '+62 812 3456 7890'],
                ['Email', $settings?->contact_email ?? 'info@raudlatuliman.id'],
                ['Status', 'Terakreditasi A'],
                ['Jenjang', 'MTs, MA, Tahfidz, Diniyah'],
            ],
        ]);
    }
}
