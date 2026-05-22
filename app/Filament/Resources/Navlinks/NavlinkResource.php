<?php

namespace App\Filament\Resources\Navlinks;

use App\Filament\Resources\Navlinks\Pages\ManageNavlinks;
use App\Models\Navlink;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class NavlinkResource extends Resource
{
    protected static ?string $model = Navlink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

    protected static string|UnitEnum|null $navigationGroup = 'Menu';

    protected static ?string $navigationLabel = 'Navbar Url';

    protected static ?string $recordTitleAttribute = 'Navbar Url';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                Select::make('type')
                    ->label('Tipe')
                    ->options(['url' => 'Url', 'dropdown' => 'Dropdown'])
                    ->default('url')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Set $set, ?string $state): void {
                        if ($state === 'dropdown') {
                            $set('url', 'javascript:void(0);');

                            return;
                        }

                        $set('url', null);
                    }),
                TextInput::make('url')
                    ->label('Url')
                    ->default(fn (Get $get): ?string => $get('type') === 'dropdown' ? 'javascript:void(0);' : null)
                    ->readOnly(fn (Get $get): bool => $get('type') === 'dropdown')
                    ->url(fn (Get $get): bool => $get('type') !== 'dropdown'),
                Select::make('parent_id')
                    ->label('Induk')
                    ->options(function () {
                        return Navlink::pluck('name', 'id');
                    })
                    ->nullable()
                    ->default(null),
                TextInput::make('order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1)
                    ->columnSpanFull(),
                Toggle::make('in_new_tab')
                    ->label('Buka di Tab Baru')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Navbar Url')
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('Url')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge(),
                TextColumn::make('order')
                    ->label('Urutan')
                    ->numeric(),
                IconColumn::make('in_new_tab')
                    ->label('Buka di Tab Baru')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageNavlinks::route('/'),
        ];
    }
}
