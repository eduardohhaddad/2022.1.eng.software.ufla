<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComissariosEventos extends Model
{
    protected $primaryKey = 'id_relacao_comissario_evento';
    protected $table = 'comissarios_eventos';

    public function evento()
    {
        return $this->hasOne(Evento::class, 'id_evento', 'id_evento');
    }

    public function comissario()
    {
        return $this->hasOne(Comissario::class, 'id_comissario', 'id_comissario');
    }
}
