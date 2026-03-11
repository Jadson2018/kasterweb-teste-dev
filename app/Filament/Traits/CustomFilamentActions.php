<?php

namespace App\Filament\Traits;

use Filament\Actions;

trait CustomFilamentActions
{
    protected function salvarAction(string $label = 'Salvar alterações'): Actions\Action
    {
        return $this->getSaveFormAction()
            ->label($label);
    }

    protected function cancelarAction(string $label = 'Cancelar'): Actions\Action
    {
        return $this->getCancelFormAction()
            ->label($label);
    }

    protected function criarAction(string $label = 'Novo registro'): Actions\CreateAction
    {
        return Actions\CreateAction::make()
            ->label($label);
    }

    protected function deletarAction(string $label = 'Excluir'): Actions\DeleteAction
    {
        return $this->getDeleteAction()
            ->label($label);
    }
}