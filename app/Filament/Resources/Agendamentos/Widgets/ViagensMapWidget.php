<?php

namespace App\Filament\Resources\Agendamentos\Widgets;

use App\Models\Agendamento;
use App\Support\TravelMap;
use Filament\Widgets\Widget;

class ViagensMapWidget extends Widget
{
    protected string $view = 'filament.resources.agendamentos.widgets.viagens-map-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getViewData(): array
    {
        $routes = Agendamento::query()
            ->selectRaw('origem, destino, count(*) as total')
            ->groupBy('origem', 'destino')
            ->orderByDesc('total')
            ->limit(8)
            ->get()
            ->map(function (Agendamento $route): ?array {
                $origin = TravelMap::city($route->origem);
                $destination = TravelMap::city($route->destino);

                if (! $origin || ! $destination) {
                    return null;
                }

                return [
                    'origem' => $origin,
                    'destino' => $destination,
                    'total' => (int) $route->total,
                    'google_url' => TravelMap::routeUrl($route->origem, $route->destino),
                    'osm_url' => TravelMap::routeUrl($route->origem, $route->destino, 'osm'),
                ];
            })
            ->filter()
            ->values();

        return [
            'cities' => array_values(TravelMap::cities()),
            'routes' => $routes,
        ];
    }
}
