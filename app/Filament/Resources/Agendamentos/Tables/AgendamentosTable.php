<?php

namespace App\Filament\Resources\Agendamentos\Tables;

use App\Models\Agendamento;
use App\Support\TravelMap;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AgendamentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('data_saida', 'desc')
            ->columns([
                ViewColumn::make('trajeto')
                    ->label('Trajeto')
                    ->view('filament.resources.agendamentos.tables.columns.route-card'),
                TextColumn::make('user.name')
                    ->label('Solicitante')
                    ->description(fn (Agendamento $record): ?string => $record->user?->email)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('data_saida')
                    ->label('Horario')
                    ->icon(Heroicon::OutlinedClock)
                    ->description(
                        fn (Agendamento $record): ?string => TravelMap::travelDurationLabel(
                            $record->data_saida?->toDateTimeString(),
                            $record->data_retorno?->toDateTimeString(),
                        )
                    )
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('data_retorno')
                    ->label('Retorno')
                    ->icon(Heroicon::OutlinedCalendar)
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('motorista.nome')
                    ->label('Motorista')
                    ->icon(Heroicon::OutlinedUsers)
                    ->searchable()
                    ->placeholder('A definir'),
                TextColumn::make('veiculo.placa')
                    ->label('Veiculo')
                    ->badge()
                    ->icon(Heroicon::OutlinedTruck)
                    ->description(fn (Agendamento $record): ?string => $record->veiculo?->modelo)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Agendamento::STATUS_OPTIONS[$state] ?? $state)
                    ->colors([
                        'warning' => 'pendente',
                        'success' => 'aprovado',
                        'danger' => 'recusado',
                        'info' => 'concluido',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(Agendamento::STATUS_OPTIONS),
                SelectFilter::make('motorista_id')
                    ->label('Motorista')
                    ->relationship('motorista', 'nome')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('veiculo_id')
                    ->label('Veiculo')
                    ->relationship('veiculo', 'placa')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                Action::make('mapa')
                    ->label('Mapa')
                    ->icon(Heroicon::OutlinedMap)
                    ->url(
                        fn (Agendamento $record): ?string => TravelMap::routeUrl($record->origem, $record->destino),
                        shouldOpenInNewTab: true,
                    ),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
