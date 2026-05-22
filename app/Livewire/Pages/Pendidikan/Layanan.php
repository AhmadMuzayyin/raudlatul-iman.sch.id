<?php

namespace App\Livewire\Pages\Pendidikan;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Layanan Pendidikan — Pondok Pesantren Raudlatul Iman')]
class Layanan extends Component
{
    public function render(): View
    {
        return view('livewire.pages.pendidikan.layanan', [
            'layanan' => [
                ['icon' => 'BookOpen', 'name' => "Tahfidzul Qur'an", 'desc' => 'Program intensif menghafal Al-Qur\'an 30 juz dengan target dan metode terukur.'],
                ['icon' => 'GraduationCap', 'name' => 'Madrasah Formal', 'desc' => 'MTs dan MA terakreditasi A yang mengikuti kurikulum nasional terpadu.'],
                ['icon' => 'PenTool', 'name' => 'Diniyah Salafiyah', 'desc' => 'Pengkajian kitab kuning, nahwu, shorof, fiqih, dan tafsir.'],
                ['icon' => 'Globe', 'name' => 'Bahasa Arab & Inggris', 'desc' => 'Lingkungan bahasa harian untuk membentuk komunikasi global.'],
                ['icon' => 'Mic', 'name' => 'Pengembangan Diri', 'desc' => 'Public speaking, kepemimpinan, dan kegiatan ekstrakurikuler.'],
                ['icon' => 'Heart', 'name' => 'Pembinaan Akhlak', 'desc' => 'Pembiasaan adab harian dan halaqah ruhiyah bersama asatidz.'],
            ],
        ]);
    }
}
