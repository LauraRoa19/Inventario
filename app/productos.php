<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $fillable =[
      'lote',
      'producto',
      'cantidad',
      'fechaVencimiento',
      'precio'
    ];
}
