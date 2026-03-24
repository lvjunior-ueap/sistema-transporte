# Architecture

## Visao geral

O sistema segue uma arquitetura simples de CRUD administrativo com Laravel, Eloquent e Filament.

## Modelos

### Agendamento

Responsavel por representar uma solicitacao de transporte.

Campos principais:

- `user_id`
- `motorista_id`
- `veiculo_id`
- `data_saida`
- `data_retorno`
- `origem`
- `destino`
- `motivo`
- `status`

### Motorista

Representa o profissional disponivel para viagens.

Campos principais:

- `nome`
- `cpf`
- `telefone`
- `categoria_cnh`
- `validade_cnh`
- `ativo`

### Veiculo

Representa o recurso fisico usado no atendimento.

Campos principais:

- `modelo`
- `placa`
- `cor`
- `capacidade`
- `ativo`

## Decisoes de arquitetura

- Filament foi usado como camada principal de backoffice
- Formularios e tabelas foram separados em classes dedicadas por resource
- `Agendamento::STATUS_OPTIONS` centraliza os estados permitidos na interface
- `motorista_id` foi mantido opcional para permitir solicitacao antes da distribuicao
- `AgendamentoResource` usa eager loading para reduzir consultas na listagem

## Limites atuais

- Ainda nao existem regras automaticas para evitar conflito de agenda
- Nao ha workflow formal de aprovacao alem do campo `status`
- Nao existe dashboard ou camada de relatorios

