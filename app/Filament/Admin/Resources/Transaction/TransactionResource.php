<?php

namespace App\Filament\Admin\Resources\Transaction;

use App\Filament\Admin\Resources\Transaction\TransactionResource\Pages;
use App\Filament\Admin\Resources\Transaction\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $slug = 'transactions';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.transactions');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.transactions');
    }

    public static function getLabel(): ?string
    {
        return __('trans.transaction');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.transactions');
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
