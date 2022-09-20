<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['nome','quantidade','vencimento','lote_id','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

}
