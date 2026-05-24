<?php

namespace App\Livewire\Pages\Home;

use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class GallerySection extends Component
{
    public function render(): View
    {
        return view('livewire.pages.home.gallery-section', [
            'galleryImages' => $this->galleryImages(),
        ]);
    }

    public function placeholder(): string
    {
        return <<<'HTML'
<section class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-4 animate-pulse">
            <div class="mx-auto h-6 w-32 rounded-full bg-surface"></div>
            <div class="mx-auto h-10 w-80 max-w-full rounded-full bg-surface"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="h-56 rounded-2xl bg-surface animate-pulse"></div>
            <div class="h-48 rounded-2xl bg-surface animate-pulse"></div>
            <div class="h-60 rounded-2xl bg-surface animate-pulse"></div>
            <div class="h-44 rounded-2xl bg-surface animate-pulse"></div>
            <div class="h-64 rounded-2xl bg-surface animate-pulse"></div>
            <div class="h-52 rounded-2xl bg-surface animate-pulse"></div>
        </div>
    </div>
</section>
HTML;
    }

    private function galleryImages(): array
    {
        return [
            'https://picsum.photos/seed/gallery1/800/600',
            'https://picsum.photos/seed/gallery2/800/600',
            'https://picsum.photos/seed/gallery3/800/600',
            'https://picsum.photos/seed/gallery4/800/600',
            'https://picsum.photos/seed/gallery5/800/600',
            'https://picsum.photos/seed/gallery6/800/600',
        ];
    }
}
