<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectItemResource\Pages;
use App\Filament\Resources\ProjectItemResource\RelationManagers;
use App\Models\ProjectItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectItemResource extends Resource
{
    protected static ?string $model = ProjectItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectItems::route('/'),
            'create' => Pages\CreateProjectItem::route('/create'),
            'view' => Pages\ViewProjectItem::route('/{record}'),
            'edit' => Pages\EditProjectItem::route('/{record}/edit'),
        ];
    }
}
