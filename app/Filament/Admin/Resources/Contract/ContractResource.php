<?php

namespace App\Filament\Admin\Resources\Contract;

use App\Filament\Admin\Resources\Contract\ContractResource\Pages;
use App\Filament\Admin\Resources\Contract\ContractResource\RelationManagers;
use App\Models\Contract;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Finance';

    protected static ?string $slug = 'contracts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('renter_id')
                    ->label(__('trans.renter'))
                    ->relationship('renter', 'name')
                    ->required()
                    ->autofocus()
                    ->placeholder(__('trans.select_renter')),

                Forms\Components\Select::make('floor_id')
                    ->label(__('trans.floor'))
                    ->relationship('floor', 'name')
                    ->required()
                    ->placeholder(__('trans.select_floor')),

                Forms\Components\Select::make('type')
                    ->label(__('trans.contract_type'))
                    ->options([
                        'rent'      => __('trans.rent'),
                        'insurance' => __('trans.insurance')
                    ])
                    ->required()
                    ->default('rent')
                    ->placeholder(__('trans.select_contract_type')),

                Forms\Components\Select::make('status')
                    ->label(__('trans.contract_status'))
                    ->options([
                        'pending'    => __('trans.pending'),
                        'active'     => __('trans.active'),
                        'expired'    => __('trans.expired'),
                        'terminated' => __('trans.terminated'),
                        'completed'  => __('trans.completed'),
                        'canceled'   => __('trans.canceled'),
                    ])
                    ->required()
                    ->default('active')
                    ->placeholder(__(('trans.select_contract_status'))),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
