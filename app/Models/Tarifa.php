<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;
    protected $fillable=['tiempo','descripcion','costo','tipo_id','jerarquia'];
    protected $table='tarifas';


    //FUNCIONES DE RALACIONES   
}
