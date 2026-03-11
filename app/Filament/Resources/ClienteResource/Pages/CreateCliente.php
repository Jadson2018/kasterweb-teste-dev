<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Repositories\ClienteRepository;
use App\Filament\Traits\CustomFilamentActions;
class CreateCliente extends CreateRecord
{
    protected static string $resource = ClienteResource::class;
    protected function afterCreate(): void
    {
        // Instancia o repository 
        $repository = new ClienteRepository();
        
        // Executa a lógica de negócio
        $repository->assignClientToCompany(
            auth()->user(), 
            $this->record // O cliente recém criado
        );

    }
}
