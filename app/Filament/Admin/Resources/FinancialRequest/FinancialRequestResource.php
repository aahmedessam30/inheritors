<?php

namespace App\Filament\Admin\Resources\FinancialRequest;

use App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource\Pages;
use App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource\RelationManagers;
use App\Models\FinancialRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FinancialRequestResource extends Resource
{
    protected static ?string $model = FinancialRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $slug = 'financial-requests';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.financial-requests');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.financial-requests');
    }

    public static function getLabel(): ?string
    {
        return __('trans.financial-request');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.financial-requests');
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
            'index' => Pages\ListFinancialRequests::route('/'),
            'create' => Pages\CreateFinancialRequest::route('/create'),
            'edit' => Pages\EditFinancialRequest::route('/{record}/edit'),
        ];
    }
}
