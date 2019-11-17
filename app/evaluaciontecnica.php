<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluaciontecnica extends Model
{
    protected $table = "empresas";
    protected $fillable = array("name", "numeroDeEmpleados", "fechaCreacionEmpresa");
}
