<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class FormCustomer extends Controller
{
    static function getFormCustomer():array{
        return [
            TextInput::make('nama')
                ->required(),
            Textarea::make('deskripsi')
                ->required()
                ->columnSpanFull()

        ];
    }
    static function getTableCustomer():array {
        return [
            TextColumn::make('nama'),
            TextColumn::make('deskripsi')
        ];
    }
}
