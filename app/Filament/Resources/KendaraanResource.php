<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Filament\Resources\KendaraanResource\RelationManagers;
use App\Http\Controllers\FormKendaraan;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;
    protected static ?string $navigationGroup = 'Surat Jalan';
    protected static?string $navigationLabel = 'Data Kendaraan';
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static?string $pluralModelLabel = 'Data Kendaraan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                FormKendaraan::getFormKendaraan()
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                FormKendaraan::getTableKendaraan()
            )
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
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'view' => Pages\ViewKendaraan::route('/{record}'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
