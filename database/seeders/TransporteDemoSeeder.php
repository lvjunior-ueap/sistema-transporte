<?php

namespace Database\Seeders;

use App\Models\Agendamento;
use App\Models\Motorista;
use App\Models\User;
use App\Models\Veiculo;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class TransporteDemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = $this->seedUsers();
        $motoristas = $this->seedMotoristas();
        $veiculos = $this->seedVeiculos();

        $this->seedAgendamentos($users, $motoristas, $veiculos);
    }

    /**
     * @return array<string, User>
     */
    protected function seedUsers(): array
    {
        $users = [
            ['name' => 'Ana Paula Costa', 'email' => 'ana.costa@transporte.local'],
            ['name' => 'Carlos Henrique Silva', 'email' => 'carlos.silva@transporte.local'],
            ['name' => 'Juliana Souza', 'email' => 'juliana.souza@transporte.local'],
            ['name' => 'Marcos Vinicius Rocha', 'email' => 'marcos.rocha@transporte.local'],
            ['name' => 'Patricia Gomes', 'email' => 'patricia.gomes@transporte.local'],
        ];

        $created = [];

        foreach ($users as $user) {
            $created[$user['email']] = User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => 'password',
                ],
            );
        }

        return $created;
    }

    /**
     * @return array<string, Motorista>
     */
    protected function seedMotoristas(): array
    {
        $motoristas = [
            ['nome' => 'Joao Batista Moraes', 'cpf' => '111.222.333-01', 'telefone' => '(96) 99111-2201', 'categoria_cnh' => 'D', 'validade_cnh' => '2028-06-14', 'ativo' => true],
            ['nome' => 'Raimundo Nonato Silva', 'cpf' => '111.222.333-02', 'telefone' => '(96) 99111-2202', 'categoria_cnh' => 'E', 'validade_cnh' => '2029-03-11', 'ativo' => true],
            ['nome' => 'Antonio Carlos Nunes', 'cpf' => '111.222.333-03', 'telefone' => '(96) 99111-2203', 'categoria_cnh' => 'D', 'validade_cnh' => '2027-12-01', 'ativo' => true],
            ['nome' => 'Paulo Sergio Almeida', 'cpf' => '111.222.333-04', 'telefone' => '(96) 99111-2204', 'categoria_cnh' => 'D', 'validade_cnh' => '2028-09-20', 'ativo' => true],
            ['nome' => 'Francisco das Chagas', 'cpf' => '111.222.333-05', 'telefone' => '(96) 99111-2205', 'categoria_cnh' => 'E', 'validade_cnh' => '2029-07-09', 'ativo' => true],
            ['nome' => 'Jose Roberto Picanco', 'cpf' => '111.222.333-06', 'telefone' => '(96) 99111-2206', 'categoria_cnh' => 'D', 'validade_cnh' => '2027-11-18', 'ativo' => true],
            ['nome' => 'Edson Ferreira Lobato', 'cpf' => '111.222.333-07', 'telefone' => '(96) 99111-2207', 'categoria_cnh' => 'C', 'validade_cnh' => '2028-04-25', 'ativo' => true],
            ['nome' => 'Marcelo Augusto Tavares', 'cpf' => '111.222.333-08', 'telefone' => '(96) 99111-2208', 'categoria_cnh' => 'B', 'validade_cnh' => '2027-08-30', 'ativo' => true],
            ['nome' => 'Leandro Barros Monteiro', 'cpf' => '111.222.333-09', 'telefone' => '(96) 99111-2209', 'categoria_cnh' => 'C', 'validade_cnh' => '2028-01-17', 'ativo' => true],
            ['nome' => 'Fernando Ribeiro Costa', 'cpf' => '111.222.333-10', 'telefone' => '(96) 99111-2210', 'categoria_cnh' => 'B', 'validade_cnh' => '2029-10-05', 'ativo' => true],
            ['nome' => 'Robson de Jesus Araujo', 'cpf' => '111.222.333-11', 'telefone' => '(96) 99111-2211', 'categoria_cnh' => 'D', 'validade_cnh' => '2028-05-07', 'ativo' => true],
            ['nome' => 'Luciano Matos Pereira', 'cpf' => '111.222.333-12', 'telefone' => '(96) 99111-2212', 'categoria_cnh' => 'E', 'validade_cnh' => '2029-01-26', 'ativo' => true],
            ['nome' => 'Gilberto Lima de Souza', 'cpf' => '111.222.333-13', 'telefone' => '(96) 99111-2213', 'categoria_cnh' => 'C', 'validade_cnh' => '2027-06-12', 'ativo' => true],
            ['nome' => 'Sandro Felipe Teixeira', 'cpf' => '111.222.333-14', 'telefone' => '(96) 99111-2214', 'categoria_cnh' => 'B', 'validade_cnh' => '2028-12-19', 'ativo' => true],
            ['nome' => 'Helio Nascimento Cardoso', 'cpf' => '111.222.333-15', 'telefone' => '(96) 99111-2215', 'categoria_cnh' => 'D', 'validade_cnh' => '2029-02-08', 'ativo' => true],
        ];

        $created = [];

        foreach ($motoristas as $motorista) {
            $created[$motorista['cpf']] = Motorista::updateOrCreate(
                ['cpf' => $motorista['cpf']],
                $motorista,
            );
        }

        return $created;
    }

    /**
     * @return array<string, Veiculo>
     */
    protected function seedVeiculos(): array
    {
        $veiculos = [
            ['modelo' => 'Marcopolo Viaggio 1050', 'placa' => 'QXA-1A01', 'cor' => 'Branco', 'capacidade' => 46, 'ativo' => true],
            ['modelo' => 'Mercedes-Benz OF-1721 Bus', 'placa' => 'QXA-1A02', 'cor' => 'Prata', 'capacidade' => 44, 'ativo' => true],
            ['modelo' => 'Volksbus 17.230', 'placa' => 'QXA-1A03', 'cor' => 'Azul', 'capacidade' => 48, 'ativo' => true],
            ['modelo' => 'Toyota Hilux Cabine Dupla', 'placa' => 'QXB-2B11', 'cor' => 'Branco', 'capacidade' => 5, 'ativo' => true],
            ['modelo' => 'Chevrolet S10 LT', 'placa' => 'QXB-2B12', 'cor' => 'Cinza', 'capacidade' => 5, 'ativo' => true],
            ['modelo' => 'Toyota Corolla XEi', 'placa' => 'QXC-3C21', 'cor' => 'Preto', 'capacidade' => 5, 'ativo' => true],
            ['modelo' => 'Chevrolet Onix Sedan Plus', 'placa' => 'QXC-3C22', 'cor' => 'Prata', 'capacidade' => 5, 'ativo' => true],
        ];

        $created = [];

        foreach ($veiculos as $veiculo) {
            $created[$veiculo['placa']] = Veiculo::updateOrCreate(
                ['placa' => $veiculo['placa']],
                $veiculo,
            );
        }

        return $created;
    }

    /**
     * @param  array<string, User>  $users
     * @param  array<string, Motorista>  $motoristas
     * @param  array<string, Veiculo>  $veiculos
     */
    protected function seedAgendamentos(array $users, array $motoristas, array $veiculos): void
    {
        $inicio = CarbonImmutable::now()->startOfDay()->addDay();

        $rotas = [
            ['origem' => 'Macapa', 'destino' => 'Santana', 'veiculo' => 'QXC-3C21', 'motorista' => '111.222.333-08', 'user' => 'ana.costa@transporte.local', 'hora' => [6, 30], 'retorno' => 4, 'status' => 'aprovado', 'motivo' => 'Transporte de equipe administrativa para reuniao operacional em Santana.'],
            ['origem' => 'Santana', 'destino' => 'Macapa', 'veiculo' => 'QXC-3C22', 'motorista' => '111.222.333-10', 'user' => 'carlos.silva@transporte.local', 'hora' => [8, 0], 'retorno' => 3, 'status' => 'pendente', 'motivo' => 'Deslocamento de servidores para atendimento institucional em Macapa.'],
            ['origem' => 'Macapa', 'destino' => 'Mazagao', 'veiculo' => 'QXB-2B11', 'motorista' => '111.222.333-07', 'user' => 'juliana.souza@transporte.local', 'hora' => [7, 15], 'retorno' => 6, 'status' => 'aprovado', 'motivo' => 'Visita tecnica a unidade de apoio em Mazagao.'],
            ['origem' => 'Mazagao', 'destino' => 'Macapa', 'veiculo' => 'QXB-2B12', 'motorista' => '111.222.333-09', 'user' => 'marcos.rocha@transporte.local', 'hora' => [13, 20], 'retorno' => 5, 'status' => 'pendente', 'motivo' => 'Retorno de equipe de campo com materiais leves.'],
            ['origem' => 'Macapa', 'destino' => 'Oiapoque', 'veiculo' => 'QXA-1A01', 'motorista' => '111.222.333-01', 'user' => 'patricia.gomes@transporte.local', 'hora' => [5, 0], 'retorno' => 18, 'status' => 'aprovado', 'motivo' => 'Viagem intermunicipal com equipe ampliada para acao itinerante em Oiapoque.'],
            ['origem' => 'Oiapoque', 'destino' => 'Macapa', 'veiculo' => 'QXA-1A02', 'motorista' => '111.222.333-02', 'user' => 'ana.costa@transporte.local', 'hora' => [6, 0], 'retorno' => 17, 'status' => 'pendente', 'motivo' => 'Retorno de equipe e equipamentos apos atendimento em Oiapoque.'],
            ['origem' => 'Macapa', 'destino' => 'Laranjal do Jari', 'veiculo' => 'QXA-1A03', 'motorista' => '111.222.333-03', 'user' => 'carlos.silva@transporte.local', 'hora' => [4, 45], 'retorno' => 20, 'status' => 'aprovado', 'motivo' => 'Deslocamento de grupo para agenda institucional em Laranjal do Jari.'],
            ['origem' => 'Laranjal do Jari', 'destino' => 'Macapa', 'veiculo' => 'QXA-1A01', 'motorista' => '111.222.333-04', 'user' => 'juliana.souza@transporte.local', 'hora' => [5, 30], 'retorno' => 20, 'status' => 'pendente', 'motivo' => 'Retorno de passageiros e documentos para a sede em Macapa.'],
            ['origem' => 'Santana', 'destino' => 'Mazagao', 'veiculo' => 'QXB-2B11', 'motorista' => '111.222.333-13', 'user' => 'marcos.rocha@transporte.local', 'hora' => [9, 10], 'retorno' => 5, 'status' => 'concluido', 'motivo' => 'Apoio logistico em deslocamento curto entre municipios vizinhos.'],
            ['origem' => 'Mazagao', 'destino' => 'Santana', 'veiculo' => 'QXC-3C22', 'motorista' => '111.222.333-14', 'user' => 'patricia.gomes@transporte.local', 'hora' => [10, 40], 'retorno' => 4, 'status' => 'aprovado', 'motivo' => 'Transporte de equipe de supervisao para reuniao em Santana.'],
            ['origem' => 'Macapa', 'destino' => 'Santana', 'veiculo' => 'QXC-3C21', 'motorista' => '111.222.333-08', 'user' => 'ana.costa@transporte.local', 'hora' => [14, 15], 'retorno' => 3, 'status' => 'concluido', 'motivo' => 'Transferencia de servidores para atendimento externo.'],
            ['origem' => 'Santana', 'destino' => 'Macapa', 'veiculo' => 'QXB-2B12', 'motorista' => '111.222.333-07', 'user' => 'carlos.silva@transporte.local', 'hora' => [16, 0], 'retorno' => 2, 'status' => 'aprovado', 'motivo' => 'Retorno de equipe apos fiscalizacao regional.'],
            ['origem' => 'Macapa', 'destino' => 'Oiapoque', 'veiculo' => 'QXA-1A02', 'motorista' => '111.222.333-05', 'user' => 'juliana.souza@transporte.local', 'hora' => [4, 30], 'retorno' => 18, 'status' => 'pendente', 'motivo' => 'Viagem longa para atendimento de campo e transporte de servidores.'],
            ['origem' => 'Oiapoque', 'destino' => 'Santana', 'veiculo' => 'QXA-1A03', 'motorista' => '111.222.333-06', 'user' => 'marcos.rocha@transporte.local', 'hora' => [5, 15], 'retorno' => 16, 'status' => 'recusado', 'motivo' => 'Solicitacao de retorno intermunicipal sem janela operacional disponivel.'],
            ['origem' => 'Mazagao', 'destino' => 'Laranjal do Jari', 'veiculo' => 'QXB-2B11', 'motorista' => '111.222.333-11', 'user' => 'patricia.gomes@transporte.local', 'hora' => [6, 20], 'retorno' => 10, 'status' => 'pendente', 'motivo' => 'Apoio a equipe tecnica com carga leve e materiais de campo.'],
            ['origem' => 'Laranjal do Jari', 'destino' => 'Mazagao', 'veiculo' => 'QXB-2B12', 'motorista' => '111.222.333-12', 'user' => 'ana.costa@transporte.local', 'hora' => [7, 0], 'retorno' => 10, 'status' => 'aprovado', 'motivo' => 'Deslocamento de retorno com equipe reduzida.'],
            ['origem' => 'Santana', 'destino' => 'Oiapoque', 'veiculo' => 'QXA-1A01', 'motorista' => '111.222.333-15', 'user' => 'carlos.silva@transporte.local', 'hora' => [5, 10], 'retorno' => 17, 'status' => 'aprovado', 'motivo' => 'Transporte coletivo para atividade externa no extremo norte do estado.'],
            ['origem' => 'Oiapoque', 'destino' => 'Laranjal do Jari', 'veiculo' => 'QXA-1A02', 'motorista' => '111.222.333-02', 'user' => 'juliana.souza@transporte.local', 'hora' => [4, 50], 'retorno' => 22, 'status' => 'pendente', 'motivo' => 'Roteiro interestadual interno de grande duracao para equipe ampliada.'],
            ['origem' => 'Macapa', 'destino' => 'Mazagao', 'veiculo' => 'QXC-3C22', 'motorista' => '111.222.333-10', 'user' => 'marcos.rocha@transporte.local', 'hora' => [11, 0], 'retorno' => 5, 'status' => 'concluido', 'motivo' => 'Viagem administrativa com pequeno grupo e documentacao.'],
            ['origem' => 'Santana', 'destino' => 'Laranjal do Jari', 'veiculo' => 'QXA-1A03', 'motorista' => '111.222.333-03', 'user' => 'patricia.gomes@transporte.local', 'hora' => [4, 40], 'retorno' => 19, 'status' => 'aprovado', 'motivo' => 'Deslocamento de comitiva para agenda regional em Laranjal do Jari.'],
        ];

        foreach ($rotas as $indice => $rota) {
            $saida = $inicio
                ->addDays($indice)
                ->setTime($rota['hora'][0], $rota['hora'][1]);

            $retorno = isset($rota['retorno'])
                ? $saida->addHours($rota['retorno'])
                : null;

            Agendamento::updateOrCreate(
                [
                    'user_id' => $users[$rota['user']]->id,
                    'veiculo_id' => $veiculos[$rota['veiculo']]->id,
                    'data_saida' => $saida,
                ],
                [
                    'motorista_id' => $motoristas[$rota['motorista']]->id,
                    'data_retorno' => $retorno,
                    'origem' => $rota['origem'],
                    'destino' => $rota['destino'],
                    'motivo' => $rota['motivo'],
                    'status' => $rota['status'],
                ],
            );
        }
    }
}
