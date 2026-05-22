<?php

namespace App\Livewire\Pages\Profil;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Visi & Misi — Pondok Pesantren Raudlatul Iman')]
class VisiMisi extends Component
{
    public function render(): View
    {
        return view('livewire.pages.profil.visi-misi', [
            'vision' => '"Menjadi lembaga pendidikan Islam terkemuka yang mencetak generasi qur\'ani berakhlak mulia, berilmu, dan bermanfaat bagi umat dan bangsa."',
            'mission' => $this->missionLines(),
        ]);
    }

    private function missionLines(): array
    {
        return [
            "Menyelenggarakan pendidikan Al-Qur'an yang berkualitas dan berkelanjutan.",
            'Mengembangkan kurikulum terpadu antara ilmu agama dan ilmu pengetahuan modern.',
            'Membentuk karakter santri yang berakhlak mulia dan mandiri.',
            'Membangun lingkungan pesantren yang kondusif dan islami.',
            'Menjalin kerja sama dengan masyarakat dan lembaga pendidikan lain.',
        ];
    }
}
