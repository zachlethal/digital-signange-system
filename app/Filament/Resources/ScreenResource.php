<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScreenResource\Pages;
use App\Models\Screen;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\Select;

class ScreenResource extends Resource
{
    protected static ?string $model = Screen::class;
    protected static ?string $navigationIcon = 'heroicon-o-tv';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required(),

                Select::make('department_id')
                ->label('Department')
                ->relationship('department', 'name')
                ->searchable()
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('code')
                    ->copyable()
                    ->copyMessage('Copied!')
                    ->copyMessageDuration(1500),
                TextColumn::make('department.name')
                    ->label('Department'),
                
            ])
            ->defaultSort('name')
            ->actions([
                Action::make('view_tv')
                    ->label('View TV')
                    ->url(fn ($record) => route('tv.show', ['code' => $record->code]))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScreens::route('/'),
            'create' => Pages\CreateScreen::route('/create'),
            'edit' => Pages\EditScreen::route('/{record}/edit'),
        ];
    }
}
