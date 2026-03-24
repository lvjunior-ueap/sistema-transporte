<?php

namespace App\Filament\Resources\Motoristas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class MotoristaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados do motorista')
                    ->description('Cadastre os dados usados para a distribuicao dos agendamentos.')
                    ->columns(12)
                    ->schema([
                        TextInput::make('nome')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(6),
                        TextInput::make('cpf')
                            ->label('CPF')
                            ->maxLength(14)
                            ->placeholder('000.000.000-00')
                            ->columnSpan(3),
                        TextInput::make('telefone')
                            ->label('Telefone')
                            ->maxLength(20)
                            ->placeholder('(91) 99999-9999')
                            ->columnSpan(3),
                        TextInput::make('categoria_cnh')
                            ->label('Categoria da CNH')
                            ->maxLength(5)
                            ->placeholder('B, C, D ou E')
                            ->columnSpan(3),
                        DatePicker::make('validade_cnh')
                            ->label('Validade da CNH')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->format('Y-m-d')
                            ->columnSpan(3),
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
