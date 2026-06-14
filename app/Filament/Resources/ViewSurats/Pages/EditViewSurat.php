<?php

namespace App\Filament\Resources\ViewSurats\Pages;

use App\Filament\Resources\ViewSurats\ViewSuratResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditViewSurat extends EditRecord
{
    protected static string $resource = ViewSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
