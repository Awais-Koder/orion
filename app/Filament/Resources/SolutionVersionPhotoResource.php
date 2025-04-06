<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolutionVersionPhotoResource\Pages;
use App\Filament\Resources\SolutionVersionPhotoResource\RelationManagers;
use App\Models\SolutionVersionPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SolutionVersionPhotoResource extends Resource
{
    protected static ?string $model = SolutionVersionPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('solution_version_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('file')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('external_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sequence')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('solution_version_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\TextColumn::make('external_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sequence')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListSolutionVersionPhotos::route('/'),
            'create' => Pages\CreateSolutionVersionPhoto::route('/create'),
            'edit' => Pages\EditSolutionVersionPhoto::route('/{record}/edit'),
        ];
    }
}
