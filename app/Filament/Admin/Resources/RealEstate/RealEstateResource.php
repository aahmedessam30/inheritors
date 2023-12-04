<?php

namespace App\Filament\Admin\Resources\RealEstate;

use App\Filament\Admin\Resources\RealEstate\RealEstateResource\Pages;
use App\Filament\Admin\Resources\RealEstate\RealEstateResource\RelationManagers;
use App\Models\RealEstate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RealEstateResource extends Resource
{
    protected static ?string $model = RealEstate::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $slug = 'real-estates';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.real_estates');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.real_estates');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.real_estates');
    }

    public static function getLabel(): ?string
    {
        return __('trans.real_estate');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.real_estates');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListRealEstates::route('/'),
            'create' => Pages\CreateRealEstate::route('/create'),
            'edit' => Pages\EditRealEstate::route('/{record}/edit'),
        ];
    }
}
