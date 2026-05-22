<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Tag;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected ?string $pendingTagNames = null;

    protected ?array $pendingSeoData = null;

    protected array $pendingSelectedTagIds = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // collect new tag names
        $this->pendingTagNames = $data['tag_names'] ?? null;

        // collect selected existing tag ids (checkbox list)
        $this->pendingSelectedTagIds = $data['tags'] ?? [];

        // collect seo data from nested 'seo' relationship input if present
        $seo = $data['seo'] ?? [];
        $this->pendingSeoData = [
            'title' => $seo['title'] ?? null,
            'description' => $seo['description'] ?? null,
            'keywords' => $seo['keywords'] ?? null,
            'canonical_url' => $seo['canonical_url'] ?? $data['default_url'] ?? null,
            'robots' => $seo['robots'] ?? true,
        ];

        // unset helper inputs before letting Filament create the post
        unset($data['tag_names'], $data['tags'], $data['seo'], $data['default_url']);

        return $data;
    }

    protected function afterCreate(): void
    {
        DB::beginTransaction();

        try {
            // create seo only if there is meaningful seo content (title, description, canonical, or keywords)
            $seoPending = $this->pendingSeoData ?? [];
            $hasSeoContent = filled($seoPending['title'] ?? null)
                || filled($seoPending['description'] ?? null)
                || filled($seoPending['canonical_url'] ?? null)
                || filled($seoPending['keywords'] ?? null);

            if ($hasSeoContent) {
                $seoData = array_filter($seoPending, fn ($v) => filled($v) || $v === false || $v === 0);
                $this->record->seo()->create($seoData);
            }

            if ($this->pendingTagNames !== null) {
                $names = collect(explode(',', $this->pendingTagNames))
                    ->map(fn ($n) => trim($n))
                    ->filter()
                    ->unique()
                    ->values();

                $createdIds = $names->map(fn ($name) => Tag::firstOrCreate(['tag' => $name])->id)->all();

                $ids = array_values(array_unique(array_merge($this->pendingSelectedTagIds ?? [], $createdIds)));

                $this->record->tags()->sync($ids);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            // remove the post we just created to avoid partial state
            try {
                $this->record->delete();
            } catch (\Throwable $_) {
                // ignore
            }

            throw $e;
        }
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Simpan');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Simpan dan tambah lagi');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }
}
