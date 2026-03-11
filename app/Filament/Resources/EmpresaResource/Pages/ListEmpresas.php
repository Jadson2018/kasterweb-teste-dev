<?php

namespace App\Filament\Resources\EmpresaResource\Pages;

use App\Filament\Resources\EmpresaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\CustomFilamentActions;

class ListEmpresas extends ListRecords
{
    protected static string $resource = EmpresaResource::class;
}
