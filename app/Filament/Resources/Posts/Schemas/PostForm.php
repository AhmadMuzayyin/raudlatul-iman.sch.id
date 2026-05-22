<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Category;
use App\Models\Institution;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten')
                    ->schema([
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->placeholder('Pilih Lembaga')
                            ->relationship('institution', 'name')
                            ->required()
                            ->afterStateUpdated(function (Get $get, Set $set, ?int $state): void {
                                $institution = Institution::find($state);
                                $code = $institution?->code ?? '';

                                $category = Category::find($get('category_id'));
                                $categorySlug = $category?->slug ?? (filled($category?->name) ? Str::slug($category->name) : '');

                                $slug = $get('slug') ?? '';

                                $base = rtrim(config('app.url') ?? url('/'), '/');

                                if ($code && $categorySlug && $slug) {
                                    $set('default_url', $base.'/'.$code.'/'.$categorySlug.'/'.$slug);
                                }
                            }),
                        Select::make('category_id')
                            ->label('Kategori')
                            ->placeholder('Pilih Kategori')
                            ->relationship('category', 'name')
                            ->required()
                            ->afterStateUpdated(function (Get $get, Set $set, ?int $state): void {
                                $category = Category::find($state);
                                $categorySlug = $category?->slug ?? (filled($category?->name) ? Str::slug($category->name) : '');

                                $institution = Institution::find($get('institution_id'));
                                $code = $institution?->code ?? '';

                                $slug = $get('slug') ?? '';

                                $base = rtrim(config('app.url') ?? url('/'), '/');

                                if ($code && $categorySlug && $slug) {
                                    $set('default_url', $base.'/'.$code.'/'.$categorySlug.'/'.$slug);
                                }
                            }),
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state): void {
                                if (($get('slug') ?? '') !== Str::slug($old ?? '')) {
                                    return;
                                }

                                $set('slug', Str::slug($state ?? ''));
                            }),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state): void {
                                $institution = Institution::find($get('institution_id'));
                                $code = $institution?->code ?? '';

                                $category = Category::find($get('category_id'));
                                $categorySlug = $category?->slug ?? (filled($category?->name) ? Str::slug($category->name) : '');

                                $slug = $state ?? '';

                                $base = rtrim(config('app.url') ?? url('/'), '/');

                                if ($code && $categorySlug && $slug) {
                                    $set('default_url', $base.'/'.$code.'/'.$categorySlug.'/'.$slug);
                                }
                            }),
                        RichEditor::make('content')
                            ->label('Isi')
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(2),
                Group::make()
                    ->schema([
                        Hidden::make('default_url')
                            ->dehydrated(),
                        Section::make('Meta')
                            ->relationship('seo')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul SEO')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(4),
                                Textarea::make('keywords')
                                    ->label('Kata Kunci')
                                    ->rows(4),
                                TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->url(),
                                Select::make('robots')
                                    ->label('Robots')
                                    ->options([
                                        true => 'Index, Follow',
                                        false => 'Noindex, Nofollow',
                                    ]),
                            ]),
                        Section::make('#Tag')
                            ->schema([
                                TextInput::make('tag_names')
                                    ->label('Tag Baru')
                                    ->helperText('Tambahkan tag baru, pisahkan dengan koma')
                                    ->placeholder('tulis tag baru, pisah koma')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
