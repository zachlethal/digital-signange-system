<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScreenControlResource\Pages;
use App\Models\ScreenControl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class ScreenControlResource extends Resource
{
    protected static ?string $model = ScreenControl::class;

    protected static ?string $navigationIcon = 'heroicon-o-play';
    protected static ?string $navigationLabel = 'Screen Controls';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                Select::make('screen_id')
                    ->label('Select Screen')
                    ->relationship('screen', 'name')
                    ->required()
                    ->preload()
                    ->searchable(false)
                    ->placeholder('Choose a screen'),

                Select::make('media_id')
                    ->label('Media')
                    ->relationship('media', 'file_path')
                    ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('screen.name')
                    ->label('Screen')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('screen.department.name')
                    ->label('Department')
                    ->sortable()
                    ->searchable(),

                ViewColumn::make('preview')
                    ->label('Preview')
                    ->view('filament.tables.columns.media-preview'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScreenControls::route('/'),
            'create' => Pages\CreateScreenControl::route('/create'),
            'edit' => Pages\EditScreenControl::route('/{record}/edit'),
        ];
    }
}
