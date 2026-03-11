<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\CustomFilamentActions;

class EditCliente extends EditRecord
{
    protected static string $resource = ClienteResource::class;
}
