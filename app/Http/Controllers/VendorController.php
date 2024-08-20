<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Http\Request;


class VendorController extends Controller
{
    static function getFormVendor(): array {
        return [
            TextInput::make('nama')
            ->required()
            ->placeholder('Nama Vendor / Perusahaan')
            ->label('Nama Vendor'),
            TextInput::make('npwp')
            ->label('NPWP / Nomow Pokok Wajib Pajak')
            ->mask('99.999.999.9-999.999')
            ->placeholder('99.999.999.9-999.999'),
            Textarea::make('alamat'),
            TextInput::make('telp')
            ->placeholder('081234567890'),
            TextInput::make('email')
            ->email()
            ->placeholder('email@example.com'),
            TextInput::make('website')
            ->placeholder('https://example.com')
            ->url()
            ->label('Website'),
            Select::make('kontak_id')
            ->label('Kontak Person')
            ->relationship('kontak','nama')

        ];
    }
}
