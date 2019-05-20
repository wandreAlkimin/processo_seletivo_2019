<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * Tabela relacionada do modelo
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * <b>fillable</b> Informa quais colunas é permitido a inserção de dados (MassAssignment)
     *
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'dtNascimento'
    ];

    /**
     * Campos que não serão mostrados no array
     *
     * @var array
     */
    protected $hidden = [
        'senha'
    ];

}
