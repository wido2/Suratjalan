<?php

namespace App\Filament\Resources\SatuanResource\Pages;

use App\Filament\Resources\SatuanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSatuan extends CreateRecord
{
    protected static string $resource = SatuanResource::class;

    public function getHeading(): string
    {
        return 'Buat Satuan Barang';

    }
}
