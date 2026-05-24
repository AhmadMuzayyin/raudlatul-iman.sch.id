<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(fn (): ?int => Auth::id())
                            ->required(),
                        Select::make('institution_id')
                            ->label('Lembaga')
                            ->placeholder('Pilih Lembaga')
                            ->relationship('institution', 'name')
                            ->required(),
                        Select::make('category_id')
                            ->label('Kategori')
                            ->placeholder('Pilih Kategori')
                            ->relationship('category', 'name')
                            ->required(),
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
                            ->required(),
                        RichEditor::make('content')
                            ->label('Isi')
                            ->required()
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike'],
                                [ToolbarButtonGroup::make('Heading', ['h1', 'h2', 'h3'])->icon('fi-o-heading')],
                                [ToolbarButtonGroup::make('Alignment', ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'])],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['undo', 'redo'],
                                ['attachFiles', 'link'],
                            ])
                            ->columnSpanFull(),
                    ])->columnSpan(2),
                Group::make()
                    ->schema([
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
                            ]),
                        Section::make('#Tag')
                            ->schema([
                                TextInput::make('tag_names')
                                    ->label('Tag Baru')
                                    ->helperText('Tambahkan tag baru, pisahkan dengan koma')
                                    ->placeholder('tulis tag baru, pisah koma')
                                    ->columnSpanFull(),
                                Radio::make('status')
                                    ->label('Status')
                                    ->options([
                                        'published' => 'Published',
                                        'draft' => 'Draft',
                                    ])
                                    ->default('published')
                                    ->required(),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
