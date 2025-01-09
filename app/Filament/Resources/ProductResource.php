<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\ProductStatus;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = '商品管理';
    protected static ?string $modelLabel = '商品';

    public static function form(Form $form): Form
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
                    // ->image()
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

                // Forms\Components\Select::make('status')
                //     ->label('商品狀態')
                //     ->required()
                //     ->options([
                //         'disabled' => '下架',
                //         'published' => '上架'
                //     ]),
                Forms\Components\Select::make('status')
                    ->label('商品狀態')
                    ->required()
                    ->enum(ProductStatus::class)
                    ->options(ProductStatus::class),
                Forms\Components\Select::make('category_id')
                    ->label('商品分類')
                    ->relationship('category', 'title'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover')
                    ->width(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sale')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('gallery')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('published_at')
                //     ->dateTime()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.title')
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
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
