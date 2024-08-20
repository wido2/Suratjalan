<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratJalanResource\Pages;
use App\Filament\Resources\SuratJalanResource\RelationManagers;
use App\Http\Controllers\SuratJalan as ControllersSuratJalan;
use App\Models\SuratJalan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratJalanResource extends Resource
{
    protected static ?string $model = SuratJalan::class;
    protected static ?string $navigationGroup = 'Surat Jalan';
    protected static?string $navigationLabel = 'Data Surat Jalan';
    protected static?string $pluralModelLabel = 'Data Surat Jalan';

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                ControllersSuratJalan::getFormSuratJalan()
            );
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
            'index' => Pages\ListSuratJalans::route('/'),
            'create' => Pages\CreateSuratJalan::route('/create'),
            'view' => Pages\ViewSuratJalan::route('/{record}'),
            'edit' => Pages\EditSuratJalan::route('/{record}/edit'),
        ];
    }
}
