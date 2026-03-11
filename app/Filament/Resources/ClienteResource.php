<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\RawJs;
use App\Rules\ValidaDocumento;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(255),

                 Forms\Components\TextInput::make('email')
                ->email()
                ->required(),

                Forms\Components\TextInput::make('telefone')
                ->label('Telefone')
                ->mask(RawJs::make(<<<'JS'
                $input.length <= 14 ? '(99) 9999-9999' : '(99) 99999-9999'
                JS))
                ->stripCharacters(['(', ')', ' ', '-'])
                ->tel(),

                Forms\Components\TextInput::make('documento')
                ->label('CPF ou CNPJ')
                ->mask(RawJs::make(<<<'JS'
                   $input.length <= 14 ? '999.999.999-999' : '99.999.999/9999-99'
                JS))
                ->stripCharacters(['.', '/', '-'])
                ->rules([new ValidaDocumento()])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->searchable(),

                Tables\Columns\TextColumn::make('documento')
                ->label('CPF/CNPJ')
                ->searchable(),

                Tables\Columns\TextColumn::make('email')
                ->label('E-mail')
                ->searchable(),
                Tables\Columns\TextColumn::make('telefone')
                ->label('Telefone')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
