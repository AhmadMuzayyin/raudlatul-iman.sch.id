<?php

namespace App\Filament\Resources\Settings;

use App\Filament\Resources\Settings\Pages\ManageSettings;
use App\Models\Setting;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static string|UnitEnum|null $navigationGroup = 'Utiliti';

    protected static ?int $navigationSort = 8;

    protected static ?string $recordTitleAttribute = 'Pengaturan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('logo')
                    ->default(null),
                TextInput::make('favicon')
                    ->default(null),
                Textarea::make('meta_description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('contact_email')
                    ->email()
                    ->default(null),
                TextInput::make('contact_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('og_title')
                    ->default(null),
                Textarea::make('og_description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image(),
                TextInput::make('canonical_url')
                    ->url()
                    ->default(null),
                Toggle::make('robots')
                    ->required(),
                Toggle::make('maintenance_mode')
                    ->required(),
                Toggle::make('enable_comments')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Pengaturan')
            ->columns([
                TextColumn::make('contact_email')
                    ->label('Email'),
                TextColumn::make('contact_phone')
                    ->label('Telepon'),
                TextColumn::make('canonical_url')
                    ->label('URL Kanonik'),
                IconColumn::make('robots')
                    ->label('Robots')
                    ->boolean(),
                IconColumn::make('maintenance_mode')
                    ->label('Mode Pemeliharaan')
                    ->boolean(),
                IconColumn::make('enable_comments')
                    ->label('Komentar')
                    ->boolean(),
            ])
            ->paginated(false)
            ->recordActions([
                EditAction::make()
                    ->label('Ubah')
                    ->icon('heroicon-o-pencil-square')
                    ->modalHeading('Edit Pengaturan')
                    ->modalDescription('Silakan ubah pengaturan sesuai kebutuhan.')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batal'),
            ])
            ->toolbarActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSettings::route('/'),
        ];
    }
}
