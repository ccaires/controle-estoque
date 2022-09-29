<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['nome','quantidade','vencimento','lote_id','categoria_id'];
    protected $dates = ['vencimento'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('vencimento');
        });
    }

}
