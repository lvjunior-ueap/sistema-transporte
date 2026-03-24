<?php

namespace App\Filament\Resources\Agendamentos\Tables;

use App\Models\Agendamento;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AgendamentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('data_saida', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Solicitante')
                    ->description(fn (Agendamento $record): ?string => $record->user?->email)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('origem')
                    ->label('Origem')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('destino')
                    ->label('Destino')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('data_saida')
                    ->label('Saida')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('data_retorno')
                    ->label('Retorno')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('motorista.nome')
                    ->label('Motorista')
                    ->searchable()
                    ->placeholder('A definir'),
                TextColumn::make('veiculo.placa')
                    ->label('Veiculo')
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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
