<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Cidade extends Model
{
    protected $table = 'cidades';

    protected $fillable = [
        'nome', 'uf_id'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'uf_id');
    }
}
