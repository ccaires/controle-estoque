<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = ['quantidade','vencimento'];

    public function produto()
    {
        // return $this->belongsTo(Produtos::class,'lote','lote_id');
        return $this->belongsTo(Produtos::class);
    }
}
