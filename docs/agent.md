# Agent Notes

## Objetivo

Este projeto implementa um painel Filament para operacao de transporte interno.

## Entidades

- `App\Models\Agendamento`
- `App\Models\Motorista`
- `App\Models\Veiculo`
- `App\Models\User`

## Relacoes

- `Agendamento` pertence a `User`
- `Agendamento` pertence a `Motorista`
- `Agendamento` pertence a `Veiculo`
- `Motorista` possui muitos `Agendamento`
- `Veiculo` possui muitos `Agendamento`

## Status de agendamento

- `pendente`
- `aprovado`
- `recusado`
- `concluido`

## Interface Filament

- `app/Filament/Resources/Agendamentos`
- `app/Filament/Resources/Motoristas`
- `app/Filament/Resources/Veiculos`

## Regras atuais

- `motorista_id` e opcional
- `veiculo_id` e obrigatorio
- `data_retorno` deve ser posterior a `data_saida`
- `AgendamentoResource` carrega `user`, `motorista` e `veiculo` com eager loading

## Ao editar

- Preserve o uso de `Schemas` e `Tables` do Filament 5
- Centralize labels de status em `Agendamento::STATUS_OPTIONS`
- Se adicionar campos de dominio, atualize model, migration e resource correspondente

