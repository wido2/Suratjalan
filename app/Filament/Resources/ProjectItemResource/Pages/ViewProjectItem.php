<?php

namespace App\Filament\Resources\ProjectItemResource\Pages;

use App\Filament\Resources\ProjectItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectItem extends ViewRecord
{
    protected static string $resource = ProjectItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
