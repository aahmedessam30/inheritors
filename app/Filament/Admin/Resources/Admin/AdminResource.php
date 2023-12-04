<?php

namespace App\Filament\Admin\Resources\Admin;

use App\Filament\Admin\Resources\Admin\AdminResource\Pages;
use App\Filament\Admin\Resources\Admin\AdminResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $slug = 'admins';

    public static function getNavigationGroup(): ?string
    {
        return __('trans.users');
    }

    public static function getPluralModelLabel(): string
    {
        return __('trans.admins');
    }

    public static function getNavigationLabel(): string
    {
        return __('trans.admins');
    }

    public static function getLabel(): ?string
    {
        return __('trans.admin');
    }

    public static function getBreadcrumb(): string
    {
        return __('trans.admins');
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
//                    ->whereHas('roles', fn(Builder $query) => $query->whereIn('name', ['admin', 'super_admin']))
                    ->whereIn('email', User::SUPER_ADMINS);
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
