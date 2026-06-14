<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use Filament\Resources\Pages\Page;

class ViewApproval extends Page
{
    protected static string $resource = SuratResource::class;

    protected string $view = 'filament.resources.surats.pages.view-approval';
}
