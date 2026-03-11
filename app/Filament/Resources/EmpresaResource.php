<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpresaResource\Pages;
use App\Filament\Resources\EmpresaResource\RelationManagers;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;
use App\Rules\ValidaDocumento;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    public static function getEloquentQuery(): Builder
    {
       return parent::getEloquentQuery()
          ->where('id', auth()->user()->empresa_id);
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
             Forms\Components\TextInput::make('nome')
                ->label('Nome da Empresa')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('cnpj')
                ->label('CNPJ')
                ->required()
                ->rules([new ValidaDocumento()])
                ->mask('99.999.999/9999-99')
                ->maxLength(18),

            Forms\Components\TextInput::make('email')
                ->label('E-mail da empresa')
                ->email()
                ->maxLength(255),

            Forms\Components\TextInput::make('telefone')
                ->label('Telefone')
                ->mask(RawJs::make(<<<'JS'
                $input.length <= 14 ? '(99) 9999-9999' : '(99) 99999-9999'
                JS))
                ->stripCharacters(['(', ')', ' ', '-'])
                ->tel(),

            Forms\Components\TextInput::make('razao_social')
                ->label('Razão Social')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->searchable(),

                Tables\Columns\TextColumn::make('razao_social')
                ->label('Razão Social')
                ->searchable(),

                Tables\Columns\TextColumn::make('email')
                ->label('E-mail')
                ->searchable(),

                Tables\Columns\TextColumn::make('cnpj')
                ->label('CNPJ')
                ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
            ])
            ->bulkActions([

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
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }
}
