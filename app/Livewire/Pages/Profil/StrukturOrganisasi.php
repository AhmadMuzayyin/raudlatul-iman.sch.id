<?php

namespace App\Livewire\Pages\Profil;

use App\Models\Organization;
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
        $struktur = Organization::query()->orderBy('id', 'asc')->get();

        return view('livewire.pages.profil.struktur-organisasi', [
            'struktur' => $struktur,
        ]);
    }
}
