<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Http\Request;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class FormKendaraan extends Controller
{
    static function getFormKendaraan():array{
        return [
            // Add form components for the kendaraan form
            Select::make('vendor_id')
            ->preload()
            ->relationship('vendor','nama'),
            TextInput::make('nama')
            ->required(),
            TextInput::make('nomor_polisi')
            ->required(),
            TextInput::make('jenis_kendaraan')
            ->required(),
            TextInput::make('merk')
            ->required(),
            DatePicker::make('tahun_pembuatan'),
            TextInput::make('warna'),
            TextInput::make('nomor_rangka'),
            TextInput::make('nomor_mesin'),
            TextInput::make('nomor_stnk')
            ->label('Nomot STNK'),
            TextInput::make('nomor_bpkb')
            ->label('Nomor BPKB'),
            DatePicker::make('tanggal_stnk')
            ->label('Tanggal STNK'),
            DatePicker::make('tanggal_bpkb')
            ->label('Tanggal BPKB')
            // Add table components for the kendaraan table


        ];
    }
    static function getTableKendaraan():array {
        return [
            // Add table components for the kendaraan table
            TextColumn::make('vendor.nama'),
            TextColumn::make('nama'),
            TextColumn::make('nomor_polisi'),
            TextColumn::make('jenis_kendaraan'),
            TextColumn::make('merk'),
            TextColumn::make('tahun_pembuatan'),
            TextColumn::make('warna'),
            TextColumn::make('nomor_rangka'),
            TextColumn::make('nomor_mesin'),
            TextColumn::make('nomor_stnk'),
            TextColumn::make('nomor_bpkb'),
            TextColumn::make('tanggal_stnk'),
            TextColumn::make('tanggal_bpkb'),
        ];
    }
}
