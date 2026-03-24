# Sistema de Transporte

Sistema interno em Laravel + Filament para gerenciamento de agendamentos de motorista e veiculo.

## Escopo atual

- Cadastro de `motoristas`
- Cadastro de `veiculos`
- Cadastro e edicao de `agendamentos`
- Listagem com filtros por status, motorista e veiculo

## Stack

- PHP 8.4
- Laravel 13
- Filament 5
- Livewire 4
- SQLite no ambiente local atual

## Fluxo principal

1. Cadastrar motoristas
2. Cadastrar veiculos
3. Criar um agendamento vinculando solicitante, veiculo e, opcionalmente, motorista
4. Atualizar o status do agendamento ao longo do atendimento

## Modelos principais

- `User`: solicitante do transporte
- `Motorista`: profissional responsavel pela execucao
- `Veiculo`: recurso utilizado no deslocamento
- `Agendamento`: registro central da viagem

## Observacoes

- O status de agendamento usa: `pendente`, `aprovado`, `recusado`, `concluido`
- `motorista_id` pode ficar nulo no momento da solicitacao
- O painel administrativo foi implementado com resources do Filament

## Proximos passos sugeridos

- Regras para conflito de horario de motorista e veiculo
- Fluxo de aprovacao
- Dashboard com indicadores operacionais

