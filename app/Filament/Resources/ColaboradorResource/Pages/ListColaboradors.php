<?php

namespace App\Filament\Resources\ColaboradorResource\Pages;

use App\Filament\Resources\ColaboradorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\CustomFilamentActions;

class ListColaboradors extends ListRecords
{
    protected static string $resource = ColaboradorResource::class;
}
