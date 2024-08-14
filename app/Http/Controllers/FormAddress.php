<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;

class FormAddress extends Controller
{
    static function getFormAddress():array{
        return [
            // Add form components for the address form
            Select::make('customer_id')
            ->required()
            ->searchable()
            ->preload()
            ->relationship('customer','nama'),

            TextInput::make('city')
            ->label('Kota'),
            TextInput::make('state')
            ->label('Provinsi')
            ->required(),
            TextInput::make('country')
            ->label('Negara'),
            TextInput::make('zip_code')
            ->label('Kode Pos')
            ->numeric()
            ->required(),
            Toggle::make('is_primary')
            ->required()
            ->default(false),
            Textarea::make('street')
            ->label('Alamat')
            ->columnSpanFull()
            ->required(),
            // Add other fields as needed
        ];
    }
    static function getTableAddress():array{
        return [
            TextColumn::make('customer.nama')
            ->searchable()
            ->label('Customer'),
            TextColumn::make('city'),
            TextColumn::make('state'),
            TextColumn::make('country'),
            TextColumn::make('zip_code'),
            TextColumn::make('street')
            ->limit(50),
            ToggleColumn::make('is_primary')
        ];
    }
}
