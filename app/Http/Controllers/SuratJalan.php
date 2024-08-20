<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;

class SuratJalan extends Controller
{
    static function getFormSuratJalan():array {
        return [

    Tabs::make('Tabs')
    ->columnSpanFull()
            ->tabs([
         Tab::make('Informasi Pengirim')
            ->icon('heroicon-o-identification')
            ->schema([
                TextInput::make('nomor_surat_jalan')
                ->required()
                ->label('Nomor Surat Jalan'),
                DatePicker::make('tanggal_pengiriman')
                ->label('Tanggal Pengiriman'),
                Select::make('Pengirim')
                ->preload()
                ->required()
                ->relationship('user','name'),
            ]),
        Tab::make('Informasi Penerima')
            ->icon('heroicon-o-map-pin')
            ->schema([
                Select::make('customer_id')
            ->preload()
            ->label('Nama Customer')
            ->relationship('customer','nama')
            ->required(),
            Select::make('kontak_id')
            ->preload()
            ->required()
            ->relationship('kontak','nama')
            ->label('Penerima'),
            Select::make('address')
            ->columnSpanFull()
            ->required()
            ->label('Alamat Penerima'),
            ]),
        Tab::make('Kendaraan')
            ->icon('heroicon-o-truck')
            ->schema([
                Select::make('kendaraan_id')
            ->preload()
            ->label('Kendaraan')
            ->relationship('kendaraan','nama')
            ->required()
            ]),
        Tab::make('Lampiran')
            ->icon('heroicon-o-paper-clip')
            ->schema([
                FileUpload::make('scan_surat')
                ->label('Scan Surat Jalan')
                ->directory('Scan_Surat_Jalan')
                ->multiple()
                ->placeholder('Klik di sini,    Lampirkan Hasil Scan Surat Jalan PDF, IMG, PNG JPEG ')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg']),
                FileUpload::make('lampiran')
                ->label('Lampiran Foto')
            ]),

        ]),

    Section::make('Detail Barang ')
    ->schema([
            Repeater::make('')
    ])

        ];
    }
}
