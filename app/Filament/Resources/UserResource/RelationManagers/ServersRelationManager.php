<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServersRelationManager extends RelationManager
{
    protected static string $relationship = 'servers';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('server_name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('ssh_host_name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('ssh_user_name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('ssh_password')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('server_name'),
                Tables\Columns\TextColumn::make('ssh_host_name'),
                Tables\Columns\TextColumn::make('ssh_user_name'),
                Tables\Columns\TextColumn::make('ssh_password'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
