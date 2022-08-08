<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comissario extends Model
{
    protected $primaryKey = 'id_comissario';
    protected $table = 'comissarios';

    public function eventos()
    {
        return $this->hasMany(ComissariosEventos::class, 'id_comissario', 'id_comissario')->with('evento');
    }
}
