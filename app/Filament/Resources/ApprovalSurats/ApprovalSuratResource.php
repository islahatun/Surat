<?php

namespace App\Filament\Resources\ApprovalSurats;

use App\Filament\Resources\ApprovalSurats\Pages\CreateApprovalSurat;
use App\Filament\Resources\ApprovalSurats\Pages\EditApprovalSurat;
use App\Filament\Resources\ApprovalSurats\Pages\ListApprovalSurats;
use App\Filament\Resources\ApprovalSurats\Pages\ViewApprovalSurat;
use App\Filament\Resources\ApprovalSurats\Schemas\ApprovalSuratForm;
use App\Filament\Resources\ApprovalSurats\Schemas\ApprovalSuratInfolist;
use App\Filament\Resources\ApprovalSurats\Tables\ApprovalSuratsTable;
use App\Models\Surat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApprovalSuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no_surat';
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
        return $user->role == '2';
    }
    public static function getNavigationLabel(): string
    {
        return 'Approval Surat';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Surat';
    }

    public static function form(Schema $schema): Schema
    {
        return ApprovalSuratForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ApprovalSuratInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApprovalSuratsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApprovalSurats::route('/'),
            'view' => ViewApprovalSurat::route('/{record}'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('status_approval', 'pending');
    }
}