<?php

namespace App\Filament\Resources\Agendamentos\Pages;

use App\Filament\Resources\Agendamentos\AgendamentoResource;
use App\Filament\Resources\Agendamentos\Widgets\ViagensMapWidget;
use App\Filament\Resources\Agendamentos\Widgets\ViagensOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgendamentos extends ListRecords
{
    protected static string $resource = AgendamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ViagensOverview::class,
            ViagensMapWidget::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int | array
    {
        return [
            'md' => 1,
            'xl' => 1,
        ];
    }
}
