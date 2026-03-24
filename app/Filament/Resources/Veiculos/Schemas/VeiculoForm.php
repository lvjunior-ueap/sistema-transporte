<?php

namespace App\Filament\Resources\Veiculos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class VeiculoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados do veiculo')
                    ->description('Mantenha os veiculos disponiveis para os agendamentos.')
                    ->columns(12)
                    ->schema([
                        TextInput::make('modelo')
                            ->label('Modelo')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(5),
                        TextInput::make('placa')
                            ->label('Placa')
                            ->required()
                            ->maxLength(10)
                            ->placeholder('ABC-1D23')
                            ->columnSpan(3),
                        TextInput::make('cor')
                            ->label('Cor')
                            ->maxLength(50)
                            ->columnSpan(2),
                        TextInput::make('capacidade')
                            ->label('Capacidade')
                            ->integer()
                            ->minValue(1)
                            ->default(5)
                            ->columnSpan(2),
                        Select::make('ativo')
                            ->label('Situacao')
                            ->options([
                                1 => 'Ativo',
                                0 => 'Inativo',
                            ])
                            ->default(1)
                            ->native(false)
                            ->required()
                            ->columnSpan(3),
                    ]),
            ]);
    }
}
