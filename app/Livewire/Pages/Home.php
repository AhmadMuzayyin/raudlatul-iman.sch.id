<?php

namespace App\Livewire\Pages;

use App\Models\Institution;
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
            'programs' => $this->programs(),
            'testimonials' => $this->testimonials(),
            'stats' => $this->stats(),
        ]);
    }

    private function programs(): array
    {
        $institutionNames = Institution::query()->pluck('name')->join(', ');

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
                'level' => $institutionNames ?: 'Madrasah Terakreditasi',
                'desc' => 'Pendidikan formal terakreditasi A yang terintegrasi dengan kurikulum pesantren.',
            ],
        ];
    }

    private function testimonials(): array
    {
        return [
            ['name' => 'Ahmad Faizal', 'role' => 'Alumni 2020', 'text' => 'Pondok Pesantren Raudlatul Iman telah membentuk karakter dan keilmuan saya. Lingkungan yang islami dan para asatidz yang ikhlas menjadi pengalaman tak terlupakan.', 'avatar' => 'https://i.pravatar.cc/120?img=1'],
            ['name' => 'Siti Aisyah', 'role' => 'Wali Santri', 'text' => 'Saya sangat puas dengan perkembangan anak saya. Hafalan qur\'annya bertambah dan akhlaknya semakin baik. Terima kasih para asatidz.', 'avatar' => 'https://i.pravatar.cc/120?img=2'],
            ['name' => 'Muhammad Rizki', 'role' => 'Alumni 2018', 'text' => 'Bekal ilmu yang saya dapatkan di pesantren ini membantu saya melanjutkan studi ke Universitas Al-Azhar Kairo. Alhamdulillah.', 'avatar' => 'https://i.pravatar.cc/120?img=3'],
            ['name' => 'Nurul Huda', 'role' => 'Alumni 2021', 'text' => 'Disiplin ibadah dan belajar yang dibiasakan di pesantren membuat saya lebih terarah dalam menata masa depan.', 'avatar' => 'https://i.pravatar.cc/120?img=4'],
            ['name' => 'Fajar Maulana', 'role' => 'Wali Santri', 'text' => 'Perkembangan karakter anak saya sangat terasa. Ia jadi lebih mandiri, santun, dan bertanggung jawab.', 'avatar' => 'https://i.pravatar.cc/120?img=5'],
            ['name' => 'Laila Rahmah', 'role' => 'Alumni 2019', 'text' => 'Kegiatan tahfidz yang terstruktur membuat hafalan saya konsisten dan terjaga hingga sekarang.', 'avatar' => 'https://i.pravatar.cc/120?img=6'],
            ['name' => 'Hasan Basri', 'role' => 'Alumni 2017', 'text' => 'Pesantren ini bukan hanya mengajarkan ilmu, tapi juga adab dalam berinteraksi dengan guru dan sesama.', 'avatar' => 'https://i.pravatar.cc/120?img=7'],
            ['name' => 'Rina Safitri', 'role' => 'Wali Santri', 'text' => 'Komunikasi pihak pesantren dengan orang tua berjalan baik sehingga kami bisa memantau perkembangan anak.', 'avatar' => 'https://i.pravatar.cc/120?img=8'],
            ['name' => 'Yusuf Kamil', 'role' => 'Alumni 2016', 'text' => 'Saya bersyukur pernah dididik di lingkungan yang menekankan kejujuran, tanggung jawab, dan ketekunan.', 'avatar' => 'https://i.pravatar.cc/120?img=9'],
            ['name' => 'Nadia Putri', 'role' => 'Alumni 2022', 'text' => 'Program pembelajaran terpadu membantu saya memahami ilmu agama dan akademik secara seimbang.', 'avatar' => 'https://i.pravatar.cc/120?img=10'],
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
