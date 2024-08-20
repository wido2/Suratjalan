<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProjectItemRelationManager extends RelationManager
{
    protected static string $relationship = 'projectItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

            TextInput::make('nama')
                ->columnSpan(3)
                ->required(),
            TextInput::make('qty')
                ->required()
                ->columnSpan(1)
                ->numeric(),
            Select::make('satuan_id')
                ->required()
                ->columnSpan(1)
                ->searchable()
                ->preload()
                ->placeholder('Satuan')
                ->relationship(
                    'satuan',
                    'nama',
                )
                ->label('Satuan'),
            Textarea::make('deskripsi')
                ->nullable()
                ->columnSpan(3),
            Toggle::make('is_active')
                ->default(true)
                ->columnSpan(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->searchable(),
                TextColumn::make('qty')
                ->searchable()
                ->sortable(),
                TextColumn::make('satuan.nama'),
                TextColumn::make('deskripsi')
                ->searchable()
                ->limit(80),
                ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
