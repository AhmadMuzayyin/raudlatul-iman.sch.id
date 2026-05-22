<?php

namespace App\Livewire\Pages\Pendidikan;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Fasilitas — Pondok Pesantren Raudlatul Iman')]
class Fasilitas extends Component
{
    public function render(): View
    {
        return view('livewire.pages.pendidikan.fasilitas', [
            'fasilitas' => [
                ['icon' => 'Home', 'name' => 'Asrama Santri', 'desc' => 'Asrama putra dan putri yang nyaman dengan pengawasan 24 jam.'],
                ['icon' => 'BookOpen', 'name' => 'Perpustakaan', 'desc' => 'Koleksi ribuan kitab klasik dan buku modern.'],
                ['icon' => 'Building', 'name' => 'Masjid', 'desc' => 'Masjid utama berdaya tampung 1.500 jamaah.'],
                ['icon' => 'Utensils', 'name' => 'Dapur & Ruang Makan', 'desc' => 'Tiga kali makan harian dengan menu bergizi.'],
                ['icon' => 'Dumbbell', 'name' => 'Sarana Olahraga', 'desc' => 'Lapangan futsal, basket, dan area kebugaran.'],
                ['icon' => 'Stethoscope', 'name' => 'Klinik Kesehatan', 'desc' => 'Layanan kesehatan oleh tenaga medis profesional.'],
                ['icon' => 'Wifi', 'name' => 'Internet & Multimedia', 'desc' => 'Lab komputer dengan koneksi cepat dan terbatas waktu.'],
                ['icon' => 'Trees', 'name' => 'Taman & Halaman Hijau', 'desc' => 'Lingkungan asri untuk muthala\'ah dan ketenangan jiwa.'],
            ],
        ]);
    }
}
