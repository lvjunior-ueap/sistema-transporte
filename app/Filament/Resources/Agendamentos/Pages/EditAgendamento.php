<?php

namespace App\Filament\Resources\Agendamentos\Pages;

use App\Filament\Resources\Agendamentos\AgendamentoResource;
use App\Filament\Resources\Agendamentos\Widgets\ViagemRecordMapWidget;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAgendamento extends EditRecord
{
    protected static string $resource = AgendamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            ViagemRecordMapWidget::make([
                'record' => $this->getRecord(),
            ]),
        ];
    }
}
