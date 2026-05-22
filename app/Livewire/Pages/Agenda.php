<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Agenda — Pondok Pesantren Raudlatul Iman')]
class Agenda extends Component
{
    public function render(): View
    {
        return view('livewire.pages.agenda', [
            'agenda' => [
                ['date' => '01 Jun 2026', 'time' => '08:00', 'title' => 'Pembukaan PSB Gelombang 2', 'place' => 'Aula Utama', 'category' => 'Pendaftaran'],
                ['date' => '12 Jun 2026', 'time' => '07:30', 'title' => 'Tasyakuran Khotmil Qur\'an', 'place' => 'Masjid Pesantren', 'category' => 'Acara'],
                ['date' => '18 Jun 2026', 'time' => '09:00', 'title' => 'Lomba Cerdas Cermat Antar Halaqah', 'place' => 'Gedung Serbaguna', 'category' => 'Lomba'],
                ['date' => '25 Jun 2026', 'time' => '19:30', 'title' => 'Pengajian Akbar Bulanan', 'place' => 'Masjid Pesantren', 'category' => 'Pengajian'],
                ['date' => '02 Jul 2026', 'time' => '06:00', 'title' => 'Outbound Santri Baru', 'place' => 'Bumi Perkemahan', 'category' => 'Kegiatan'],
                ['date' => '10 Jul 2026', 'time' => '16:00', 'title' => 'Wisuda Tahfidz Angkatan XIII', 'place' => 'Aula Utama', 'category' => 'Wisuda'],
            ],
        ]);
    }
}
