<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorios extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'relatorios';

    protected $fillable = [
        'ativo',
    ];
}
