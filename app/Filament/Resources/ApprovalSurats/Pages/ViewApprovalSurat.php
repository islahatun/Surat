<?php

namespace App\Filament\Resources\ApprovalSurats\Pages;

use App\Filament\Resources\ApprovalSurats\ApprovalSuratResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewApprovalSurat extends ViewRecord
{
    protected static string $resource = ApprovalSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
