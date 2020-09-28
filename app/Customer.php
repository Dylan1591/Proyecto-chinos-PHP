<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="customers";
    protected $primaryKey="CustomerId";
    public $timestamps = false;

    //relacion empleado- clientes
    public function clientes(){
        return $this->hasMany('App\Customer' , 'SupportRepId');
    }
}