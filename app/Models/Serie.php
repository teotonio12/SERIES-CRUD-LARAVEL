<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    #protected $table = 'series'; 
    # por padrão o nome da tabela é o nome desta classe tudo em minusculo e no plural


    #se eu não quiser salvar as colunas created_at e update_at
    # public $timestamps = false;

    #colunas preenchiveis
    protected $fillable = ['nome'];

}
