<?php

namespace App\Livewire\Pages\Home;

use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class HeroSection extends Component
{
    public function render(): View
    {
        return view('livewire.pages.home.hero-section', [
            'interval' => 3000,
            'slides' => $this->slides(),
        ]);
    }

    public function placeholder(): string
    {
        return <<<'HTML'
<section class="relative h-[92vh] min-h-[560px] overflow-hidden bg-gradient-emerald-deep">
    <div class="absolute inset-0 noise opacity-30"></div>
    <div class="relative h-full container mx-auto px-4 lg:px-8 flex items-center">
        <div class="max-w-2xl space-y-6 animate-pulse">
            <div class="h-7 w-40 rounded-full bg-white/15"></div>
            <div class="h-20 rounded-3xl bg-white/15"></div>
            <div class="h-7 w-11/12 rounded-full bg-white/10"></div>
            <div class="h-7 w-9/12 rounded-full bg-white/10"></div>
            <div class="h-12 w-44 rounded-full bg-white/20"></div>
        </div>
    </div>
</section>
HTML;
    }

    private function slides(): array
    {
        return [
            [
                'image' => 'https://picsum.photos/seed/hero1/1600/900',
                'image_raster' => 'https://picsum.photos/seed/hero1/1200/700',
                'image_webp' => 'https://picsum.photos/seed/hero1/1200/700.webp',
                'badge' => 'Pondok Pesantren',
                'title' => "Membentuk Generasi Qur'ani Berakhlak Mulia",
                'subtitle' => 'Wadah pendidikan Islam terpadu yang memadukan ilmu agama, akademik, dan keterampilan hidup.',
                'ctaLabel' => 'Daftar Sekarang',
                'ctaHref' => url('/pendidikan/pendaftaran'),
            ],
            [
                'image' => 'https://picsum.photos/seed/hero2/1600/900',
                'image_raster' => 'https://picsum.photos/seed/hero2/1200/700',
                'image_webp' => 'https://picsum.photos/seed/hero2/1200/700.webp',
                'badge' => 'Pendidikan Terpadu',
                'title' => 'Tahfidz, Akademik & Karakter',
                'subtitle' => "Program unggulan untuk mencetak hafidz qur'an yang berprestasi di dunia dan akhirat.",
                'ctaLabel' => 'Lihat Program',
                'ctaHref' => url('/pendidikan/layanan'),
            ],
            [
                'image' => 'https://picsum.photos/seed/hero3/1600/900',
                'image_raster' => 'https://picsum.photos/seed/hero3/1200/700',
                'image_webp' => 'https://picsum.photos/seed/hero3/1200/700.webp',
                'badge' => 'Fasilitas Modern',
                'title' => 'Lingkungan Islami yang Mendidik',
                'subtitle' => 'Asrama nyaman, ruang belajar modern, dan suasana spiritual yang menenangkan jiwa.',
                'ctaLabel' => 'Jelajahi Fasilitas',
                'ctaHref' => url('/pendidikan/fasilitas'),
            ],
        ];
    }
}
