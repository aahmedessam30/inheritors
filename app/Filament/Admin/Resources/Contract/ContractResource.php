<?php

namespace App\Filament\Admin\Resources\Contract;

use App\Filament\Admin\Resources\Contract\ContractResource\Pages;
use App\Filament\Admin\Resources\Contract\ContractResource\RelationManagers;
use App\Models\Contract;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $slug = 'contracts';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.finance');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.contracts');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.contracts');
    }

    public static function getLabel(): ?string
    {
        return __('trans.contract');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.contracts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('contract_info')
                        ->label(__('trans.contract_info'))
                        ->columns(2)
                        ->schema([
                            Forms\Components\Select::make('renter_id')
                                ->label(__('trans.renter'))
                                ->relationship('renter', 'name')
                                ->required()
                                ->placeholder(__('trans.select_renter')),

                            Forms\Components\Select::make('floor_id')
                                ->label(__('trans.floor'))
                                ->relationship('floor', 'name')
                                ->getOptionLabelFromRecordUsing(fn ($record) => __("trans." . Str::snake(strtolower($record->name)) . "_floor"))
                                ->required()
                                ->placeholder(__('trans.select_floor')),

                            Forms\Components\Select::make('type')
                                ->label(__('trans.contract_type'))
                                ->options([
                                    'rent'      => __('trans.rent'),
                                    'insurance' => __('trans.sale')
                                ])
                                ->required()
                                ->default('rent')
                                ->placeholder(__('trans.select_contract_type')),

                            Forms\Components\Select::make('status')
                                ->label(__('trans.contract_status'))
                                ->options([
                                    'pending'    => __('trans.pending'),
                                    'active'     => __('trans.active'),
                                    'terminated' => __('trans.terminated'),
                                    'canceled'   => __('trans.canceled'),
                                    'completed'  => __('trans.completed'),
                                ])
                                ->required()
                                ->default('active')
                                ->placeholder(__(('trans.select_contract_status'))),

                            Forms\Components\TextInput::make('rent')
                                ->label(__('trans.contract_monthly_rent'))
                                ->numeric()
                                ->required()
                                ->default(0)
                                ->minValue(0)
                                ->placeholder(__('trans.contract_monthly_rent')),

                            Forms\Components\TextInput::make('insurance')
                                ->label(__('trans.contract_insurance'))
                                ->numeric()
                                ->required()
                                ->default(0)
                                ->minValue(0)
                                ->placeholder(__('trans.contract_insurance')),

                            Forms\Components\TextInput::make('duration')
                                ->label(__('trans.contract_duration'))
                                ->columnSpanFull()
                                ->numeric()
                                ->required()
                                ->default(1)
                                ->minValue(1)
                                ->maxValue(5)
                                ->live()
                                ->afterStateUpdated(fn (Set $set, ?string $state, Get $get) => $set('end_date', Carbon::parse($get('start_date'))->addYears($state)->format('Y-m-d')))
                                ->placeholder(__('trans.contract_duration')),

                            Forms\Components\DatePicker::make('start_date')
                                ->label(__('trans.contract_start_date'))
                                ->required()
                                ->default(now())
                                ->minDate(now()->format('Y-m-d'))
                                ->live()
                                ->afterStateUpdated(fn (Set $set, ?string $state, Get $get) => $set('end_date', Carbon::parse($state)->addYears($get('duration'))->format('Y-m-d')))
                                ->placeholder(__('trans.contract_start_date'))
                                ->displayFormat('Y-m-d'),

                            Forms\Components\DatePicker::make('end_date')
                                ->label(__('trans.contract_end_date'))
                                ->required()
                                ->default(fn (Get $get) => now()->addYears($get('duration'))->format('Y-m-d'))
                                ->minDate(now())
                                ->maxDate(fn (Get $get) => Carbon::parse($get('start_date'))->addYears($get('duration'))->format('Y-m-d'))
                                ->placeholder(__('trans.contract_end_date'))
                                ->displayFormat('Y-m-d'),
                        ]),

                    Forms\Components\Wizard\Step::make('contract_status')
                        ->label(__('trans.contract_status'))
                        ->schema([
                            Forms\Components\Textarea::make('description')
                                ->label(__('trans.description'))
                                ->rows(4),

                            Forms\Components\Textarea::make('notes')
                                ->label(__('trans.notes'))
                                ->rows(4),

                            Forms\Components\DatePicker::make('completed_date')
                                ->label(__('trans.contract_completed_date'))
                                ->disabled()
                                ->displayFormat('Y-m-d'),

                            Forms\Components\DatePicker::make('terminated_date')
                                ->label(__('trans.contract_terminated_date'))
                                ->disabled(fn (Get $get) => now() > Carbon::parse($get('start_date'))->addMonths(2)->format('Y-m-d'))
                                ->minDate(fn (Get $get) => Carbon::parse($get('start_date'))->format('Y-m-d'))
                                ->maxDate(fn (Get $get) => Carbon::parse($get('end_date'))->format('Y-m-d'))
                                ->displayFormat('Y-m-d'),

                            Forms\Components\Textarea::make('terminated_reason')
                                ->label(__('trans.contract_terminated_reason'))
                                ->disabled(fn (Get $get) => now() > Carbon::parse($get('start_date'))->addMonths(2)->format('Y-m-d'))
                                ->rows(4),

                            Forms\Components\DatePicker::make('canceled_date')
                                ->label(__('trans.contract_canceled_date'))
                                ->minDate(fn (Get $get) => Carbon::parse($get('start_date'))->format('Y-m-d'))
                                ->maxDate(fn (Get $get) => Carbon::parse($get('end_date'))->format('Y-m-d'))
                                ->displayFormat('Y-m-d'),

                            Forms\Components\Textarea::make('canceled_reason')
                                ->label(__('trans.contract_canceled_reason'))
                                ->rows(4),
                        ]),
                ])
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('renter.name')
                    ->label(__('trans.renter'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('floor.name')
                    ->label(__('trans.floor'))
                    ->formatStateUsing(fn(Model $record) => __("trans." . Str::snake(strtolower($record->floor->name)) . "_floor"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label(__('trans.contract_type'))
                    ->formatStateUsing(fn(Model $record) => __("trans." . Str::snake(strtolower($record->type))))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label(__('trans.contract_status'))
                    ->badge()
                    ->color(fn(Model $record) => match ($record->status) {
                        'pending'                => 'primary',
                        'active', 'completed'    => 'success',
                        'terminated', 'canceled' => 'danger',
                    })
                    ->formatStateUsing(fn(Model $record) => __("trans." . Str::snake(strtolower($record->status))))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rent')
                    ->label(__('trans.contract_monthly_rent'))
                    ->formatStateUsing(fn(Model $record) => "$record->rent " . config('app.currency_' . app()->getLocale()))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('insurance')
                    ->label(__('trans.contract_insurance'))
                    ->formatStateUsing(fn(Model $record) => "$record->insurance " . config('app.currency_' . app()->getLocale()))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label(__('trans.contract_duration'))
                    ->formatStateUsing(fn(Model $record) => $record->duration == 1
                        ? "$record->duration " . (app()->getLocale() == 'ar' ? 'سنة' : 'Year')
                        : "$record->duration " . (app()->getLocale() == 'ar' ? 'سنوات' : 'Years'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label(__('trans.contract_start_date'))
                    ->searchable()
                    ->sortable()
                    ->date(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label(__('trans.contract_end_date'))
                    ->searchable()
                    ->sortable()
                    ->date(),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
