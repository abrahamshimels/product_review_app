<?php

namespace App\Filament\Resources\ReviewSourceResource\Pages;

use App\Filament\Resources\ReviewSourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReviewSources extends ListRecords
{
    protected static string $resource = ReviewSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
