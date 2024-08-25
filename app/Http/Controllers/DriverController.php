<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    static function getDriverForm():array{
        return [
          Section::make('Detail Driver')
          ->schema([
            TextInput::make('nama')
            ->required()
            ->maxLength(255),
            TextInput::make('telepon')
            ->required()
            ->placeholder('Nomor Telepon / WA')
            ->maxLength(255),
            TextInput::make('ktp')
            ->required()
            ->placeholder('Nomor KTP')
            ->maxLength(255),
            TextInput::make('sim')
            ->required()
            ->placeholder('Nomor SIM')
            ->maxLength(255),
            TextInput::make('email')
            ->required()
            ->email()
            ->maxLength(255),
            DatePicker::make('tanggal_lahir'),
            TextInput::make('tempat_lahir')
            ->maxLength(255),
            TextInput::make('agama')
            ->maxLength(255),
            TextInput::make('alamat'),
            TextInput::make('scan_ktp'),

          ])
        ];
    }

    static function getDriverTable():array{
        return[
            TextColumn::make('nama')
            ->searchable()
            ->label('Nama'),
            TextColumn::make('telepon')
            ->searchable()
            ->label('Telepon'),
            TextColumn::make('alamat')
            ->searchable()
            ->limit(80),
            TextColumn::make('email')
            ->searchable()
            ->label('Email'),
            TextColumn::make('tanggal_lahir')
            ->sortable(),
            TextColumn::make('tempat_lahir')
            ->sortable(),
            TextColumn::make('agama')
            ->sortable(),
            ImageColumn::make('scan_ktp')
        ];
    }

    static function infoDriver():array{
        return [

            
        ];
    }
}
