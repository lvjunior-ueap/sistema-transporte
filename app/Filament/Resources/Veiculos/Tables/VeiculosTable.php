<?php

namespace App\Filament\Resources\Veiculos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class VeiculosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('modelo')
            ->columns([
                TextColumn::make('modelo')
                    ->label('Veiculo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('placa')
                    ->label('Placa')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                TextColumn::make('cor')
                    ->label('Cor')
                    ->toggleable(),
                TextColumn::make('capacidade')
                    ->label('Capacidade')
                    ->sortable(),
                IconColumn::make('ativo')
                    ->label('Ativo')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('ativo')
                    ->label('Situacao')
                    ->options([
                        1 => 'Ativo',
                        0 => 'Inativo',
                    ]),
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
