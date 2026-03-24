<?php

namespace App\Filament\Resources\Agendamentos\Schemas;

use App\Models\Agendamento;
use App\Models\Motorista;
use App\Models\User;
use App\Models\Veiculo;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class AgendamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Solicitacao')
                    ->description('Informe quem solicitou a viagem e qual o recurso previsto para o atendimento.')
                    ->columns(12)
                    ->schema([
                        Select::make('user_id')
                            ->label('Solicitante')
                            ->relationship('user', 'name')
                            ->getOptionLabelFromRecordUsing(fn (User $record): string => "{$record->name} ({$record->email})")
                            ->searchable()
                            ->preload()
                            ->default(auth()->id())
                            ->required()
                            ->columnSpan(6),
                        Select::make('status')
                            ->label('Status')
                            ->options(Agendamento::STATUS_OPTIONS)
                            ->default('pendente')
                            ->native(false)
                            ->required()
                            ->columnSpan(3),
                        Select::make('motorista_id')
                            ->label('Motorista')
                            ->relationship('motorista', 'nome')
                            ->getOptionLabelFromRecordUsing(fn (Motorista $record): string => $record->nome ?: "Motorista #{$record->id}")
                            ->searchable()
                            ->preload()
                            ->placeholder('Definir depois')
                            ->helperText('O motorista pode ser definido no momento da aprovacao.')
                            ->columnSpan(3),
                        Select::make('veiculo_id')
                            ->label('Veiculo')
                            ->relationship('veiculo', 'placa')
                            ->getOptionLabelFromRecordUsing(
                                fn (Veiculo $record): string => trim("{$record->modelo} - {$record->placa}", ' -')
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(4),
                    ]),
                Section::make('Roteiro da viagem')
                    ->description('Defina o deslocamento previsto e o motivo do agendamento.')
                    ->columns(12)
                    ->schema([
                        TextInput::make('origem')
                            ->label('Origem')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(6),
                        TextInput::make('destino')
                            ->label('Destino')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(6),
                        DateTimePicker::make('data_saida')
                            ->label('Data de saida')
                            ->native(false)
                            ->seconds(false)
                            ->displayFormat('d/m/Y H:i')
                            ->format('Y-m-d H:i:s')
                            ->required()
                            ->live()
                            ->columnSpan(3),
                        DateTimePicker::make('data_retorno')
                            ->label('Data de retorno')
                            ->native(false)
                            ->seconds(false)
                            ->displayFormat('d/m/Y H:i')
                            ->format('Y-m-d H:i:s')
                            ->minDate(fn (Get $get) => $get('data_saida'))
                            ->rule('after:data_saida')
                            ->required()
                            ->columnSpan(3),
                        Textarea::make('motivo')
                            ->label('Motivo da viagem')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
