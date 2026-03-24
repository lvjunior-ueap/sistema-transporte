<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamento extends Model
{
    use HasFactory;

    public const STATUS_OPTIONS = [
        'pendente' => 'Pendente',
        'aprovado' => 'Aprovado',
        'recusado' => 'Recusado',
        'concluido' => 'Concluido',
    ];

    protected $fillable = [
        'user_id',
        'motorista_id',
        'veiculo_id',
        'data_saida',
        'data_retorno',
        'origem',
        'destino',
        'motivo',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'data_saida' => 'datetime',
            'data_retorno' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function motorista(): BelongsTo
    {
        return $this->belongsTo(Motorista::class);
    }

    public function veiculo(): BelongsTo
    {
        return $this->belongsTo(Veiculo::class);
    }
}
