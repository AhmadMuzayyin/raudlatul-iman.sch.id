<?php

namespace App\Filament\Resources\Navlinks\Pages;

use App\Filament\Resources\Navlinks\NavlinkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageNavlinks extends ManageRecords
{
    protected static string $resource = NavlinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus')
                ->modalHeading('Tambah Data Navlink')
                ->modalDescription('Silakan isi data Data Navlink dengan benar.')
                ->modalSubmitActionLabel('Simpan')
                ->modalCancelActionLabel('Batal')
                ->createAnotherAction(fn ($action) => $action->label('Simpan dan tambah lagi')),
        ];
    }
}
