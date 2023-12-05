<?php

namespace App\Filament\Admin\Resources\Receipt;

use App\Filament\Admin\Resources\Receipt\ReceiptResource\Pages;
use App\Filament\Admin\Resources\Receipt\ReceiptResource\RelationManagers;
use App\Models\Receipt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceiptResource extends Resource
{
    protected static ?string $model = Receipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    protected static ?string $slug = 'receipts';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.receipts');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.receipts');
    }

    public static function getLabel(): ?string
    {
        return __('trans.receipt');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.receipts');
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
            'index' => Pages\ListReceipts::route('/'),
            'create' => Pages\CreateReceipt::route('/create'),
            'edit' => Pages\EditReceipt::route('/{record}/edit'),
        ];
    }
}
