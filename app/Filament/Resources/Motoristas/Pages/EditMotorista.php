<?php

namespace App\Filament\Resources\Motoristas\Pages;

use App\Filament\Resources\Motoristas\MotoristaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMotorista extends EditRecord
{
    protected static string $resource = MotoristaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
