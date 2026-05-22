<?php

namespace App\Livewire\Pages\Informasi;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Post $post;

    public function render(): View
    {
        return view('livewire.pages.informasi.show', [
            'pageTitle' => $this->post->title.' — Pondok Pesantren Raudlatul Iman',
        ]);
    }
}
