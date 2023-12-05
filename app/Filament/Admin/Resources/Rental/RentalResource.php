<?php

namespace App\Filament\Admin\Resources\Rental;

use App\Filament\Admin\Resources\Rental\RentalResource\Pages;
use App\Filament\Admin\Resources\Rental\RentalResource\RelationManagers;
use App\Models\Contract;
use App\Models\Rental;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $slug = 'rentals';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.rentals');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.rentals');
    }

    public static function getLabel(): ?string
    {
        return __('trans.rental');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.rentals');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('contract_id')
                    ->label(__('trans.contract'))
                    ->required()
                    ->relationship('contract')
                    ->getOptionLabelFromRecordUsing(fn(Contract $record) => $record->name)
                    ->placeholder(__('trans.select_contract')),

                Forms\Components\TextInput::make('amount')
                    ->label(__('trans.amount'))
                    ->required()
                    ->live(debounce: 400)
                    ->afterStateUpdated(function (Forms\Set $set, $state, Forms\Get $get) {
                        $set('paid', $state);
                        $set('remaining', $get('amount') - $state);
                        $set('is_paid', $get('remaining') == 0);
                        $set('description', __('trans.rental_description', [
                            'date'      => now()->translatedFormat('M j, Y'),
                            'amount'    => "$state " . config('app.currency_' . app()->getLocale()),
                            'paid'      => "$state " . config('app.currency_' . app()->getLocale()),
                            'remaining' => $get('remaining') . ' ' . config('app.currency_' . app()->getLocale()),
                        ]));
                    })
                    ->suffix(config('app.currency_' . app()->getLocale())),

                Forms\Components\TextInput::make('paid')
                    ->label(__('trans.paid'))
                    ->required()
                    ->live(debounce: 400)
                    ->afterStateUpdated(function (Forms\Set $set, $state, Forms\Get $get) {
                        $remaining = $get('amount') - $state;
                        $set('remaining', $remaining);
                        $set('is_paid', $remaining == 0);
                        $set('description', __('trans.rental_description', [
                            'date'      => now()->format('d, F Y'),
                            'amount'    => "$state " . config('app.currency_' . app()->getLocale()),
                            'paid'      => "$state " . config('app.currency_' . app()->getLocale()),
                            'remaining' => "$remaining " . config('app.currency_' . app()->getLocale()),
                        ]));
                    })
                    ->suffix(config('app.currency_' . app()->getLocale())),

                Forms\Components\TextInput::make('remaining')
                    ->label(__('trans.remaining'))
                    ->required()
                    ->live(debounce: 400)
                    ->afterStateUpdated(fn(Forms\Set $set, $state) => $set('is_paid', $state == 0))
                    ->suffix(config('app.currency_' . app()->getLocale())),

                Forms\Components\Textarea::make('description')
                    ->label(__('trans.description'))
                    ->rows(3)
                    ->columnSpanFull()
                    ->nullable(),

                Forms\Components\Toggle::make('is_paid')
                    ->label(__('trans.is_paid'))
                    ->required()
                    ->default(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contract.name')
                    ->label(__('trans.contract'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label(__('trans.amount'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('paid')
                    ->label(__('trans.paid'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('remaining')
                    ->label(__('trans.remaining'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('paid_date')
                    ->label(__('trans.for_month'))
                    ->date()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_paid')
                    ->label(__('trans.is_paid'))
                    ->boolean(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
