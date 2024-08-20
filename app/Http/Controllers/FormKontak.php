<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Http\Request;

class FormKontak extends Controller
{
    static function getFormKontak():array{
        return [
            Select::make('customer_id')
            // ->required()
            ->searchable()
            ->preload()
            ->label('Customer')
            ->relationship('customer','nama')
            ,
            Select::make('vendor_id')
            ->searchable()
            ->preload()
            ->label('Vendor')
            ->relationship('vendor','nama'),
            TextInput::make('nama')
            ->required()
            ->maxLength(255),
            TextInput::make('email')
            ->required()
            ->email()
            ->maxLength(255),
            TextInput::make('telepon')
            ->required()
            ->maxLength(255),
            TextInput::make('jabatan')
            ->required()
            ->maxLength(255),

            // Add other fields as needed

        ];
    }
    static function getTableKontak():array{
        return [
            TextColumn::make('customer.nama')
            ->searchable()
            ->label('Customer'),
            TextColumn::make('vendor.nama')
            ->searchable(),
            TextColumn::make('nama')
            ->searchable(),
            TextColumn::make('email')
            ->searchable(),
            TextColumn::make('telepon')
            ->searchable(),
            TextColumn::make('jabatan')
            ->searchable(),
        ];
    }
}
