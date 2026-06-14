<?php

namespace App\Filament\Resources\ViewSurats\Pages;

use App\Filament\Resources\ViewSurats\ViewSuratResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListViewSurats extends ListRecords
{
    protected static string $resource = ViewSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
