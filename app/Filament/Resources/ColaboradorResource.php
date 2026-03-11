<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColaboradorResource\Pages;
use App\Filament\Resources\ColaboradorResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Facades\Filament;
use App\Repositories\ColaboradorRepository;

class ColaboradorResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $modelLabel = 'Colaborador';

    protected static ?string $pluralModelLabel = 'Colaboradores';

    protected static ?string $navigationLabel = 'Colaboradores';

    public static function getEloquentQuery(): Builder
    {
    return parent::getEloquentQuery()
        ->where('empresa_id', auth()->user()->empresa_id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('nivel')
                ->label('Nível')
                ->options([
                    1 => 'Administrador',
                    2 => 'Gerente',
                    3 => 'Desvincular colaborador'
                ])
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable(),

                Tables\Columns\TextColumn::make('email')
                ->label('E-mail')
                ->searchable(),

                Tables\Columns\TextColumn::make('nivel')
                ->label('Cargo')
                ->formatStateUsing(function ($state) {
                   return match ($state) {
                      1 => 'Administrador',
                      2 => 'Colaborador',
                     default => 'Usuário',
                   };
               }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
            ])

            ->headerActions([
                Tables\Actions\Action::make('adicionarColaborador')
                ->label('Adicionar colaborador')
                ->form([
                    Select::make('user_id')
                        ->label('Usuário')
                        ->options(User::where('id', '!=', Filament::auth()->id())
                        ->where('empresa_id', '!=', Filament::auth()->user()->empresa_id)
                        ->pluck('email', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('nivel')
                        ->label('Nível')
                        ->options([
                            1 => 'Administrador',
                            2 => 'Gerente',
                        ])
                        ->required(),
                ])
                ->action(function (array $data) {

                    app(ColaboradorRepository::class)
                    ->atualizarNivel($data);

                }),
       
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
            'index' => Pages\ListColaboradors::route('/'),
            'create' => Pages\CreateColaborador::route('/create'),
            'edit' => Pages\EditColaborador::route('/{record}/edit'),
        ];
    }
}
