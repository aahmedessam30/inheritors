<?php

namespace App\Filament\Admin\Resources\FinancialAccount;

use App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource\Pages;
use App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource\RelationManagers;
use App\Models\FinancialAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FinancialAccountResource extends Resource
{
    protected static ?string $model = FinancialAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-pound';

    protected static ?string $slug = 'financial-accounts';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.financial-accounts');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.financial-accounts');
    }

    public static function getLabel(): ?string
    {
        return __('trans.financial-account');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.financial-accounts');
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
            'index' => Pages\ListFinancialAccounts::route('/'),
            'create' => Pages\CreateFinancialAccount::route('/create'),
            'edit' => Pages\EditFinancialAccount::route('/{record}/edit'),
        ];
    }
}
