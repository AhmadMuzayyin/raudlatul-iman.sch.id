<?php

namespace App\Livewire\Pages\Profil;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Sejarah — Pondok Pesantren Raudlatul Iman')]
class Sejarah extends Component
{
    public function render(): View
    {
        $histories = collect();

        return view('livewire.pages.profil.sejarah', [
            'histories' => $histories,
            'timeline' => $this->timelineFallback(),
        ]);
    }

    private function timelineFallback(): array
    {
        return [
            ['year' => '2000', 'title' => 'Pendirian Pesantren', 'desc' => 'KH. Ahmad Fauzi mendirikan Pondok Pesantren Raudlatul Iman dengan 12 santri pertama.'],
            ['year' => '2005', 'title' => 'Pembukaan Madrasah Tsanawiyah', 'desc' => 'Memperluas jenjang pendidikan formal dengan didirikannya MTs.'],
            ['year' => '2010', 'title' => 'Madrasah Aliyah & Akreditasi', 'desc' => 'MA berdiri dan pesantren meraih akreditasi A dari BAN-S/M.'],
            ['year' => '2015', 'title' => 'Program Tahfidz Intensif', 'desc' => 'Membuka kelas khusus tahfidz dengan metode talaqqi.'],
            ['year' => '2020', 'title' => 'Modernisasi Fasilitas', 'desc' => 'Renovasi asrama, masjid, dan pembangunan gedung lab modern.'],
            ['year' => '2025', 'title' => 'Era Digital', 'desc' => 'Peluncuran e-learning dan perpustakaan digital pesantren.'],
        ];
    }
}
