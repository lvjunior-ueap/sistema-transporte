<?php

namespace App\Filament\Resources\Motoristas\Pages;

use App\Filament\Resources\Motoristas\MotoristaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMotoristas extends ListRecords
{
    protected static string $resource = MotoristaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
