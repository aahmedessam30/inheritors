<?php

namespace App\Filament\Admin\Resources\Renter;

use App\Filament\Admin\Resources\Renter\RenterResource\Pages;
use App\Filament\Admin\Resources\Renter\RenterResource\RelationManagers;
use App\Models\Renter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class RenterResource extends Resource
{
    protected static ?string $model = Renter::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $slug = 'renters';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.users');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.renters');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.renters');
    }

    public static function getLabel(): ?string
    {
        return __('trans.renter');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.renters');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('floor_id')
                    ->label(__('trans.floor'))
                    ->relationship('floor', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => __("trans." . Str::snake(strtolower($record->name)) . "_floor"))
                    ->required()
                    ->placeholder(__('trans.select_floor')),

                Forms\Components\TextInput::make('name')
                    ->label(__('trans.name'))
                    ->placeholder(__('trans.name'))
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->label(__('trans.phone'))
                    ->placeholder(__('trans.phone'))
                    ->required(),

                Forms\Components\TextInput::make('national_id')
                    ->label(__('trans.national_id'))
                    ->placeholder(__('trans.national_id'))
                    ->required(),

                Forms\Components\TextInput::make('address')
                    ->label(__('trans.address'))
                    ->placeholder(__('trans.address'))
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('floor.name')
                    ->label(__('trans.floor'))
                    ->formatStateUsing(fn(Model $record) => __("trans." . Str::snake(strtolower($record->floor->name)) . "_floor"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('trans.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('trans.phone'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('national_id')
                    ->label(__('trans.national_id'))
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListRenters::route('/'),
            'create' => Pages\CreateRenter::route('/create'),
            'edit' => Pages\EditRenter::route('/{record}/edit'),
        ];
    }
}
