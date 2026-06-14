<?php

namespace App\Filament\Resources\ViewSurats;

use App\Filament\Resources\ViewSurats\Pages\CreateViewSurat;
use App\Filament\Resources\ViewSurats\Pages\EditViewSurat;
use App\Filament\Resources\ViewSurats\Pages\ListViewSurats;
use App\Filament\Resources\ViewSurats\Pages\ViewViewSurat;
use App\Filament\Resources\ViewSurats\Schemas\ViewSuratForm;
use App\Filament\Resources\ViewSurats\Schemas\ViewSuratInfolist;
use App\Filament\Resources\ViewSurats\Tables\ViewSuratsTable;
use App\Models\Surat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViewSuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'no_surat';
        public static function getNavigationGroup(): ?string
    {
        return 'Surat';
    }

    public static function getNavigationLabel(): string
    {
        return 'Cetak Surat';
    }

    public static function form(Schema $schema): Schema
    {
        return ViewSuratForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ViewSuratInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ViewSuratsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListViewSurats::route('/'),
            'create' => CreateViewSurat::route('/create'),
            'view' => ViewViewSurat::route('/{record}'),
            'edit' => EditViewSurat::route('/{record}/edit'),
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
            ->whereIn('status_approval', ['approved', 'rejected']);
    }
}
