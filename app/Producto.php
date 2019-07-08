<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable =[
      'lote',
      'producto',
      'cantidad',
      'fechaVencimiento',
      'precio'
    ];
}
