<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey = 'id_evento';
    protected $table = 'eventos';

    protected $fillable = [
        'ativo',
    ];


    public function comissarios()
    {
        //return $this->hasMany(ComissionarioEnderecos::class, 'id_comissionario', 'id_comissionario')->with('cidade');
    }
}
