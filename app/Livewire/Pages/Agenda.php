<?php

namespace App\Livewire\Pages;

use App\Models\Schedule;
use Illuminate\Support\Collection;
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
        $schedules = Schedule::query()
            ->with(['category', 'institution'])
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        $institutions = $this->institutions($schedules);

        return view('livewire.pages.agenda', [
            'agenda' => $schedules,
            'institutions' => $institutions,
        ]);
    }

    private function institutions(Collection $schedules): Collection
    {
        return $schedules
            ->pluck('institution')
            ->filter()
            ->unique('id')
            ->values();
    }
}
