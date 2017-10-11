<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TCliente extends Model
  {
    protected $table='tcliente';
    protected $primaryKey='dniCliente';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tVenta()
    {
      return $this->hasMany('App\Model\TVenta','dniCliente');
    }

  }

 ?>