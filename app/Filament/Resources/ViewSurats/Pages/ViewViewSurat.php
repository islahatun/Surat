<?php

namespace App\Filament\Resources\ViewSurats\Pages;

use App\Filament\Resources\ViewSurats\ViewSuratResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewViewSurat extends ViewRecord
{
    protected static string $resource = ViewSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
