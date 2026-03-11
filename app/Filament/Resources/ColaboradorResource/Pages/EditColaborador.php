<?php

namespace App\Filament\Resources\ColaboradorResource\Pages;

use App\Filament\Resources\ColaboradorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Repositories\ColaboradorRepository;
use App\Filament\Traits\CustomFilamentActions;

class EditColaborador extends EditRecord
{
    protected static string $resource = ColaboradorResource::class;
    protected function getFormActions(): array
    {
      return [
        Actions\Action::make('atualizarNivel')
            ->label('Salvar Alterações')
            ->color('primary')
            ->action(function () {

                $data = $this->form->getState();

                $data['user_id'] = $this->record->id;

                app(\App\Repositories\ColaboradorRepository::class)
                    ->atualizarNivel($data);

                $this->redirect($this->getResource()::getUrl('index'));
            }),
        Actions\Action::make('cancel')
            ->label('Voltar')
            ->color('gray')
            ->url($this->getResource()::getUrl('index')),
      ];
    }
}
