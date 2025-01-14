<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\ProductStatus;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('商品名稱')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->label('商品描述')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('cover')
                    ->label('商品封面')
                    ->required()
                    ,
                Forms\Components\FileUpload::make('gallery')
                    ->label('圖片集')
                    ->multiple()
                    ->reorderable()
                    ,
                Forms\Components\TextInput::make('price')
                    ->label('價格')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sale')
                    ->label('原價')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('上架日期'),
                Forms\Components\Select::make('status')
                    ->label('商品狀態')
                    ->required()
                    ->enum(ProductStatus::class)
                    ->options(ProductStatus::class),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
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
