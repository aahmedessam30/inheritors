<?php

namespace App\Filament\Admin\Resources\InheritorFamily;

use App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource\Pages;
use App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InheritorFamilyResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'inheritor-families';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.users');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.inheritor-families');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.inheritor-families');
    }

    public static function getLabel(): ?string
    {
        return __('trans.inheritor-family');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.inheritor-families');
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
                Tables\Columns\TextColumn::make('name')
                    ->label(__('trans.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('inheritor.name')
                    ->label(__('trans.inheritor_name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('trans.email'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label(__('trans.phone'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('national_id')
                    ->label(__('trans.national_id'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label(__('trans.is_verified'))
                    ->icon(fn(Model $record) => !is_null($record->email_verified_at) ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->color(fn(Model $record) => !is_null($record->email_verified_at) ? 'success' : 'danger'),
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query
//                    ->whereRelation('roles', 'name', 'inheritor_family')
                    ->whereNotNull('inheritor_id')
                    ->whereNotIn('email', User::SUPER_ADMINS);
            });
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
            'index' => Pages\ListInheritorFamilies::route('/'),
            'create' => Pages\CreateInheritorFamily::route('/create'),
            'edit' => Pages\EditInheritorFamily::route('/{record}/edit'),
        ];
    }
}
