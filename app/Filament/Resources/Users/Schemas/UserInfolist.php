<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                // TextEntry::make('email_verified_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                TextEntry::make('nik')
                        ->label('NIK'),
                TextEntry::make('tanggal_lahir')
                        ->label('Tanggal Lahir'),
                TextEntry::make('role')
                    ->label('Role')
                    ->formatStateUsing(fn ($state) => [
                        '1' => 'Admin',
                        '2' => 'Kepala Desa',
                    ][$state] ?? '-'),
                 TextEntry::make('alamat')
                    ->label('Alamat'),  
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
