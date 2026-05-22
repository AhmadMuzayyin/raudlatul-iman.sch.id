<?php

namespace App\Livewire\Pages\Profil;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Profil — Pondok Pesantren Raudlatul Iman')]
class Index extends Component
{
    public function render(): View
    {
        return view('livewire.pages.profil.index', [
            'sections' => [
                ['to' => url('/profil/identitas'), 'icon' => 'BookOpen', 'name' => 'Identitas', 'desc' => 'Nama, alamat, NPSP, dan data resmi pesantren.'],
                ['to' => url('/profil/visi-misi'), 'icon' => 'Eye', 'name' => 'Visi & Misi', 'desc' => 'Cita-cita besar dan langkah konkret yang kami tempuh.'],
                ['to' => url('/profil/sejarah'), 'icon' => 'History', 'name' => 'Sejarah', 'desc' => 'Perjalanan pesantren sejak berdiri hingga kini.'],
                ['to' => url('/profil/struktur-organisasi'), 'icon' => 'Network', 'name' => 'Struktur Organisasi', 'desc' => 'Susunan pengurus dan jajaran pengasuh.'],
            ],
        ]);
    }
}
