<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use App\Filament\Resources\EmpresaResource;
use Filament\Actions;
use App\Repositories\EmpresaRepository;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\CustomFilamentActions;

class CreateEmpresa extends CreateRecord
{
    use CustomFilamentActions;
    protected static string $resource = EmpresaResource::class;
    protected function afterCreate(): void
    {
        // Instancia o repository 
        $repository = new EmpresaRepository();
        
        // Executa a lógica de negócio
        $repository->assignUserToCompany(
            auth()->user(), 
            $this->record // A empresa recém-criada
        );
    }
}
