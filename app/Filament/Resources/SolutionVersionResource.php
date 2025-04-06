<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolutionVersionResource\Pages;
use App\Filament\Resources\SolutionVersionResource\RelationManagers;
use App\Models\SolutionVersion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SolutionVersionResource extends Resource
{
    protected static ?string $model = SolutionVersion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('solution_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('marker_type_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('marker_type_category_id')
                    ->numeric(),
                Forms\Components\TextInput::make('eta_report_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\TextInput::make('description'),
                Forms\Components\TextInput::make('fire_rating'),
                Forms\Components\TextInput::make('photos'),
                Forms\Components\TextInput::make('eta_page_numbers'),
                Forms\Components\TextInput::make('bim_files'),
                Forms\Components\TextInput::make('website_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('version_code')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('version_explanation'),
                Forms\Components\Toggle::make('is_visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('solution_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marker_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marker_type_category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('eta_report_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('website_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('version_code')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean(),
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
            'index' => Pages\ListSolutionVersions::route('/'),
            'create' => Pages\CreateSolutionVersion::route('/create'),
            'edit' => Pages\EditSolutionVersion::route('/{record}/edit'),
        ];
    }
}
