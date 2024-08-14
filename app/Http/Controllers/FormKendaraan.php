<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class FormKendaraan extends Controller
{
    static function getFormKendaraan():array{
        return [
            // Add form components for the kendaraan form

            TextInput::make('nama')
            ->required(),
            TextInput::make('nomor_polisi')
            ->required(),
            TextInput::make('jenis_kendaraan')
            ->required(),


        ];
    }
    static function getTableKendaraan():array {
        return [
            // Add table components for the kendaraan table
            TextColumn::make('nama'),
            TextColumn::make('nomor_polisi'),
            TextColumn::make('jenis_kendaraan'),
        ];
    }
}
