<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Media Library';
    protected static ?string $modelLabel = 'Media';
    protected static ?string $pluralModelLabel = 'Media Files';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            FileUpload::make('file_path')
                ->label('Media File')
                ->directory('media')
                ->required()
                ->acceptedFileTypes(['image/*', 'video/*'])
                ->previewable(true),

            Select::make('type')
                ->options([
                    'image' => 'Image',
                    'video' => 'Video',
                ])
                ->required(),

            TextInput::make('duration')
                ->numeric()
                ->label('Duration (ms)')
                ->visible(fn ($get) => $get('type') === 'image')
                ->minValue(1000)
                ->helperText('Duration in milliseconds (only for images).'),

            DateTimePicker::make('start_time')
                ->label('Start Date & Time')
                ->required(),

            DateTimePicker::make('end_time')
                ->label('End Date & Time')
                ->required()
                ->rule(fn (callable $get) => function ($attribute, $value, $fail) use ($get) {
                    $start = $get('start_time');
                    if ($start && $value && Carbon::parse($value)->lessThanOrEqualTo(Carbon::parse($start))) {
                        $fail('End date/time must be after start date/time.');
                    }
                }),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('file_path')
                    ->label('File Name')
                    ->formatStateUsing(fn ($state) => basename($state))
                    ->wrap()
                    ->searchable(),

                ViewColumn::make('preview')
                    ->label('Preview')
                    ->view('filament.tables.columns.media-preview'),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge(),

                TextColumn::make('start_time')
                    ->label('Start')
                    ->dateTime('d M Y H:i'),

                TextColumn::make('end_time')
                    ->label('End')
                    ->dateTime('d M Y H:i'),
            ])
            ->recordUrl(null)
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
