<?php

namespace App\Filament\Resources\Agendamentos\Widgets;

use App\Models\Agendamento;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ViagensOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Panorama das viagens';

    protected ?string $description = 'Leitura rapida da operacao atual.';

    protected function getStats(): array
    {
        $total = Agendamento::query()->count();
        $pendentes = Agendamento::query()->where('status', 'pendente')->count();
        $confirmadas = Agendamento::query()->whereIn('status', ['aprovado', 'concluido'])->count();
        $semMotorista = Agendamento::query()->whereNull('motorista_id')->count();

        return [
            Stat::make('Total de viagens', $total)
                ->description('Base total cadastrada')
                ->descriptionIcon(Heroicon::OutlinedMap)
                ->color('primary'),
            Stat::make('Pendentes', $pendentes)
                ->description('Aguardando tratamento')
                ->descriptionIcon(Heroicon::OutlinedExclamationCircle)
                ->color('warning'),
            Stat::make('Confirmadas', $confirmadas)
                ->description('Aprovadas ou concluidas')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->color('success'),
            Stat::make('Sem motorista', $semMotorista)
                ->description('Viagens ainda sem atribuicao')
                ->descriptionIcon(Heroicon::OutlinedUsers)
                ->color('gray'),
        ];
    }
}
