<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyGroupResource\Pages;
use App\Filament\Resources\PropertyGroupResource\RelationManagers;
use App\Models\PropertyGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyGroupResource extends Resource
{
    protected static ?string $model = PropertyGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('marker_type_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('marker_type_category_id')
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Toggle::make('is_filter_collapsed_by_default'),
                Forms\Components\TextInput::make('sequence')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('marker_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marker_type_category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_filter_collapsed_by_default')
                    ->boolean(),
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
            'index' => Pages\ListPropertyGroups::route('/'),
            'create' => Pages\CreatePropertyGroup::route('/create'),
            'edit' => Pages\EditPropertyGroup::route('/{record}/edit'),
        ];
    }
}
