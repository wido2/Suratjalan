<?php

namespace App\Filament\Resources\ProjectItemResource\Pages;

use App\Filament\Resources\ProjectItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectItem extends EditRecord
{
    protected static string $resource = ProjectItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
