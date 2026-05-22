<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Tag;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected ?string $pendingTagNames = null;

    protected ?array $pendingSeoData = null;

    protected array $pendingSelectedTagIds = [];

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->pendingTagNames = $data['tag_names'] ?? null;
        $this->pendingSelectedTagIds = $data['tags'] ?? [];

        $seo = $data['seo'] ?? [];
        $this->pendingSeoData = [
            'title' => $seo['title'] ?? null,
            'description' => $seo['description'] ?? null,
            'keywords' => $seo['keywords'] ?? null,
            'canonical_url' => $seo['canonical_url'] ?? $data['default_url'] ?? null,
            'robots' => $seo['robots'] ?? true,
        ];

        unset($data['tag_names'], $data['tags'], $data['seo'], $data['default_url']);

        return $data;
    }

    protected function afterSave(): void
    {
        DB::beginTransaction();

        try {
            $seoPending = $this->pendingSeoData ?? [];
            $hasSeoContent = filled($seoPending['title'] ?? null)
                || filled($seoPending['description'] ?? null)
                || filled($seoPending['canonical_url'] ?? null)
                || filled($seoPending['keywords'] ?? null);

            if ($hasSeoContent) {
                $seoData = array_filter($seoPending, fn ($v) => filled($v) || $v === false || $v === 0);
                $this->record->seo()->updateOrCreate([], $seoData);
            }

            // handle tags: combine selected ids and newly created tag ids
            $selected = $this->pendingSelectedTagIds ?? [];

            if ($this->pendingTagNames !== null) {
                $names = collect(explode(',', $this->pendingTagNames))
                    ->map(fn ($n) => trim($n))
                    ->filter()
                    ->unique()
                    ->values();

                $createdIds = $names->map(fn ($name) => Tag::firstOrCreate(['tag' => $name])->id)->all();

                $ids = array_values(array_unique(array_merge($selected, $createdIds)));

                $this->record->tags()->sync($ids);
            } else {
                // if no new names, just sync selected
                $this->record->tags()->sync($selected);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function mount($record): void
    {
        parent::mount($record);

        $data = [];

        if ($this->record) {
            $data['tag_names'] = $this->record->tags->pluck('tag')->implode(', ');

            $seo = $this->record->seo;

            $data['seo_title'] = $seo->title ?? null;
            $data['seo_description'] = $seo->description ?? null;
            $data['seo_keywords'] = $seo->keywords ?? null;
            // compute default url from record if seo canonical not set
            $defaultUrl = null;
            $institution = $this->record->institution;
            $category = $this->record->category;
            if ($institution && $category && filled($this->record->slug)) {
                $code = $institution->code ?? '';
                $categorySlug = $category->slug ?? (filled($category->name) ? Str::slug($category->name) : '');
                $base = rtrim(config('app.url') ?? url('/'), '/');
                if ($code && $categorySlug) {
                    $defaultUrl = $base.'/'.$code.'/'.$categorySlug.'/'.$this->record->slug;
                }
            }

            $data['canonical_url'] = $seo->canonical_url ?? $defaultUrl;
            $data['robots'] = $seo->robots ?? true;
        }

        $existing = $this->form->getState();
        if (! is_array($existing)) {
            $existing = (array) $existing;
        }

        $this->form->fill(array_merge($existing, $data));
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus')
                ->modalHeading('Hapus Data Postingan')
                ->modalDescription('Anda yakin ingin menghapus data postingan ini?')
                ->modalSubmitActionLabel('Hapus')
                ->modalCancelActionLabel('Batal'),
        ];
    }
}
