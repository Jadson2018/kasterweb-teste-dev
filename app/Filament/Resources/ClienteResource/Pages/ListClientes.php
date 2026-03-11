<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\CustomFilamentActions;

class ListClientes extends ListRecords
{
    use CustomFilamentActions;
    protected static string $resource = ClienteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->criarAction('Create'),
        ];
    }
}
