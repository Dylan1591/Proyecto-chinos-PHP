<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table ="employees";
    protected $primaryKey = "EmployeeId";
    public $timestamps = false;
    

    protected $dates =[
        'BirthDate' , 'HireDate'
    ];
    //relacion
    public function subalternos(){
        return $this->hasMany('App\Empleado', 'ReportsTo');
    }

    public function jefe_directo(){
        return $this->belongsTo('App\Empleado', 'ReportsTo');
    }
    public function clientes(){
        return $this->hasMany('App\Customer', 'SupportRepId'); 
    }
}