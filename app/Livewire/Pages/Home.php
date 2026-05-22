<?php

namespace App\Livewire\Pages;

use App\Models\Institution;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Beranda — Pondok Pesantren Raudlatul Iman')]
class Home extends Component
{
    public function render(): View
    {
        return view('livewire.pages.home', [
            'slides' => $this->slides(),
            'programs' => $this->programs(),
            'announcements' => $this->announcements(),
            'galleryImages' => $this->galleryImages(),
            'testimonials' => $this->testimonials(),
            'stats' => $this->stats(),
        ]);
    }

    private function slides(): array
    {
        return [
            [
                'image' => 'https://picsum.photos/seed/pesantren1/1920/1080',
                'badge' => 'Pondok Pesantren',
                'title' => "Membentuk Generasi Qur'ani Berakhlak Mulia",
                'subtitle' => 'Wadah pendidikan Islam terpadu yang memadukan ilmu agama, akademik, dan keterampilan hidup.',
                'ctaLabel' => 'Daftar Sekarang',
                'ctaHref' => url('/pendidikan/pendaftaran'),
            ],
            [
                'image' => 'https://picsum.photos/seed/pesantren2/1920/1080',
                'badge' => 'Pendidikan Terpadu',
                'title' => 'Tahfidz, Akademik & Karakter',
                'subtitle' => "Program unggulan untuk mencetak hafidz qur'an yang berprestasi di dunia dan akhirat.",
                'ctaLabel' => 'Lihat Program',
                'ctaHref' => url('/pendidikan/layanan'),
            ],
            [
                'image' => 'https://picsum.photos/seed/pesantren3/1920/1080',
                'badge' => 'Fasilitas Modern',
                'title' => 'Lingkungan Islami yang Mendidik',
                'subtitle' => 'Asrama nyaman, ruang belajar modern, dan suasana spiritual yang menenangkan jiwa.',
                'ctaLabel' => 'Jelajahi Fasilitas',
                'ctaHref' => url('/pendidikan/fasilitas'),
            ],
        ];
    }

    private function programs(): array
    {
        return [
            [
                'icon' => 'BookOpen',
                'name' => "Tahfidzul Qur'an",
                'level' => 'Wajib',
                'desc' => "Program menghafal Al-Qur'an 30 juz dengan metode talaqqi dan muraja'ah harian.",
            ],
            [
                'icon' => 'Award',
                'name' => 'Madrasah Diniyah',
                'level' => 'Reguler',
                'desc' => 'Pendalaman kitab kuning, fiqih, akidah, dan tafsir dengan kurikulum salaf modern.',
            ],
            [
                'icon' => 'Sparkles',
                'name' => 'Akademik Formal',
                'level' => Institution::query()->pluck('name')->join(', ') ?: 'Madrasah Terakreditasi',
                'desc' => 'Pendidikan formal terakreditasi A yang terintegrasi dengan kurikulum pesantren.',
            ],
        ];
    }

    private function announcements(): array
    {
        $posts = Post::query()
            ->published()
            ->with(['category', 'institution'])
            ->latest()
            ->take(4)
            ->get();

        $cards = $posts->map(function (Post $post, int $index): array {
            return [
                'date' => $post->created_at?->translatedFormat('d M Y') ?? 'Hari ini',
                'title' => $post->title,
                'excerpt' => Str::of(strip_tags((string) $post->content))
                    ->squish()
                    ->limit(120)
                    ->toString(),
                'image' => sprintf('https://picsum.photos/seed/post-%d/800/600', $post->id ?? $index + 1),
            ];
        })->all();

        $fallback = [
            ['date' => '20 Mei 2026', 'title' => 'Pembukaan Pendaftaran Santri Baru Tahun Ajaran 2026/2027', 'excerpt' => 'PSB gelombang pertama telah dibuka untuk jenjang MTs, MA, dan Tahfidz. Daftarkan putra-putri Anda sekarang.', 'image' => 'https://picsum.photos/seed/news1/800/600'],
            ['date' => '18 Mei 2026', 'title' => 'Wisuda Tahfidz Angkatan XII', 'excerpt' => '67 santri diwisuda sebagai hafidz qur\'an.', 'image' => 'https://picsum.photos/seed/news2/400/300'],
            ['date' => '15 Mei 2026', 'title' => 'Lomba Murottal Tingkat Provinsi', 'excerpt' => 'Santri raih juara 1 lomba murottal.', 'image' => 'https://picsum.photos/seed/news3/400/300'],
            ['date' => '10 Mei 2026', 'title' => 'Pengajian Akbar Akhir Bulan', 'excerpt' => 'Bersama KH. Ahmad Fauzi.', 'image' => 'https://picsum.photos/seed/news4/400/300'],
        ];

        return array_slice(array_merge($cards, $fallback), 0, 4);
    }

    private function galleryImages(): array
    {
        return [
            'https://picsum.photos/seed/g1/600/800',
            'https://picsum.photos/seed/g2/600/600',
            'https://picsum.photos/seed/g3/600/700',
            'https://picsum.photos/seed/g4/600/500',
            'https://picsum.photos/seed/g5/600/750',
            'https://picsum.photos/seed/g6/600/650',
        ];
    }

    private function testimonials(): array
    {
        return [
            ['name' => 'Ahmad Faizal', 'role' => 'Alumni 2020', 'text' => 'Pondok Pesantren Raudlatul Iman telah membentuk karakter dan keilmuan saya. Lingkungan yang islami dan para asatidz yang ikhlas menjadi pengalaman tak terlupakan.', 'avatar' => 'https://picsum.photos/seed/t1/200/200'],
            ['name' => 'Siti Aisyah', 'role' => 'Wali Santri', 'text' => 'Saya sangat puas dengan perkembangan anak saya. Hafalan qur\'annya bertambah dan akhlaknya semakin baik. Terima kasih para asatidz.', 'avatar' => 'https://picsum.photos/seed/t2/200/200'],
            ['name' => 'Muhammad Rizki', 'role' => 'Alumni 2018', 'text' => 'Bekal ilmu yang saya dapatkan di pesantren ini membantu saya melanjutkan studi ke Universitas Al-Azhar Kairo. Alhamdulillah.', 'avatar' => 'https://picsum.photos/seed/t3/200/200'],
        ];
    }

    private function stats(): array
    {
        return [
            ['value' => 1250, 'label' => 'Santri Aktif', 'suffix' => '+'],
            ['value' => 85, 'label' => 'Pengajar', 'suffix' => ''],
            ['value' => 25, 'label' => 'Tahun Berdiri', 'suffix' => ''],
            ['value' => 3500, 'label' => 'Alumni', 'suffix' => '+'],
        ];
    }
}
