<?php

namespace App\Filament\Resources\Agendamentos\Widgets;

use App\Models\Agendamento;
use App\Support\TravelMap;
use Filament\Widgets\Widget;

class ViagemRecordMapWidget extends Widget
{
    public ?Agendamento $record = null;

    protected string $view = 'filament.resources.agendamentos.widgets.viagem-record-map-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 10;

    protected function getViewData(): array
    {
        $record = $this->record;

        return [
            'record' => $record,
            'embedUrl' => TravelMap::embedRouteUrl($record?->origem, $record?->destino),
            'origem' => TravelMap::city($record?->origem),
            'destino' => TravelMap::city($record?->destino),
            'googleUrl' => TravelMap::routeUrl($record?->origem, $record?->destino),
            'osmUrl' => TravelMap::routeUrl($record?->origem, $record?->destino, 'osm'),
            'duracao' => TravelMap::travelDurationLabel(
                $record?->data_saida?->toDateTimeString(),
                $record?->data_retorno?->toDateTimeString(),
            ),
        ];
    }
}
