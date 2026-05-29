<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animais'; 
    protected $fillable = ['nome', 'especie', 'raca', 'idade', 'foto', 'descricao'];
}
