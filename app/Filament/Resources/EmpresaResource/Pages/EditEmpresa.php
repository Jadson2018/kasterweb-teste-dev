<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use App\Filament\Resources\EmpresaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Repositories\EmpresaRepository;
use App\Filament\Traits\CustomFilamentActions;

class EditEmpresa extends EditRecord
{
    use CustomFilamentActions;
    protected static string $resource = EmpresaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }

    protected function getFormActions(): array
    {
      return [

        $this->getSaveFormAction()
        ->label('Salvar Alterações'),
        Actions\Action::make('delete')
            ->label('Excluir empresa')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading('Excluir empresa')
            ->modalDescription('Tem certeza que deseja excluir esta empresa? Todos os usuários serão desvinculados.')
            ->modalSubmitActionLabel('Sim, excluir')
            ->modalCancelActionLabel('Cancelar')
            ->action(function () {

                app(EmpresaRepository::class)
                    ->deletarEmpresa($this->record->id);

                $this->redirect('/admin/empresas');
        }),
        $this->getCancelFormAction(),

      ];
    }
}
