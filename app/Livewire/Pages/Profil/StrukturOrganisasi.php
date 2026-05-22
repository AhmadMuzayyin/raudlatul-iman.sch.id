<?php

namespace App\Livewire\Pages\Profil;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Struktur Organisasi — Pondok Pesantren Raudlatul Iman')]
class StrukturOrganisasi extends Component
{
    public function render(): View
    {
        return view('livewire.pages.profil.struktur-organisasi', [
            'struktur' => [
                ['name' => 'KH. Muhammad Yusuf', 'role' => 'Pengasuh Pesantren', 'img' => 'https://picsum.photos/seed/s1/400/400'],
                ['name' => 'Ust. Abdullah Hakim', 'role' => 'Direktur Pendidikan', 'img' => 'https://picsum.photos/seed/s2/400/400'],
                ['name' => 'Ust. Hasan Basri', 'role' => 'Kepala MTs', 'img' => 'https://picsum.photos/seed/s3/400/400'],
                ['name' => "Ust. Imam Syafi'i", 'role' => 'Kepala MA', 'img' => 'https://picsum.photos/seed/s4/400/400'],
                ['name' => 'Ust. Anwar Ibrahim', 'role' => 'Koordinator Tahfidz', 'img' => 'https://picsum.photos/seed/s5/400/400'],
                ['name' => 'Ust. Khairul Anam', 'role' => 'Kepala Asrama', 'img' => 'https://picsum.photos/seed/s6/400/400'],
            ],
        ]);
    }
}
