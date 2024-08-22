<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Http\Request;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

use function Laravel\Prompts\search;

class FormKendaraan extends Controller
{
    static function getFormKendaraan():array{
        return [
            // Add form components for the kendaraan form
            Select::make('vendor_id')
            ->preload()
            ->createOptionForm(
                VendorController::getFormVendor()
            )
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
            TextColumn::make('vendor.nama')
            ->searchable(),
            TextColumn::make('nama')
            ->searchable()
            ,
            TextColumn::make('nomor_polisi')
            ->searchable(),
            TextColumn::make('jenis_kendaraan')
            ->searchable()
            ->sortable(),
            TextColumn::make('merk')
            ->searchable()
            ->sortable(),
            TextColumn::make('tahun_pembuatan')
            ->searchable()
            ->sortable(),
            TextColumn::make('warna')
            ->searchable()
            ->sortable(),
            TextColumn::make('nomor_rangka')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault:true),
            TextColumn::make('nomor_mesin')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault:true),
            TextColumn::make('nomor_stnk')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault:true),
            TextColumn::make('nomor_bpkb')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault:true),
            TextColumn::make('tanggal_stnk')
            ->sortable()
            ->searchable()
            ->toggleable(isToggledHiddenByDefault:true),
            TextColumn::make('tanggal_bpkb')
            ->searchable()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault:true),
        ];
    }
}
