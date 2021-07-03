<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'cpf', 'cidade_id'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
}
