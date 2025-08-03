<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewSourceResource\Pages;
use App\Filament\Resources\ReviewSourceResource\RelationManagers;
use App\Models\ReviewSource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewSourceResource extends Resource
{
    protected static ?string $model = ReviewSource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Select::make('review_id')
                ->relationship('review', 'id')
                ->required(),
            Forms\Components\TextInput::make('type')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('url')
                ->required()
                ->url()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('review.id'),
            Tables\Columns\TextColumn::make('type'),
            Tables\Columns\TextColumn::make('url')
                ->url(fn($record) => $record->url)
                ->openUrlInNewTab(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
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
            'index' => Pages\ListReviewSources::route('/'),
            'create' => Pages\CreateReviewSource::route('/create'),
            'edit' => Pages\EditReviewSource::route('/{record}/edit'),
        ];
    }
}
