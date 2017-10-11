<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TProducto extends Model
  {
    protected $table='tproducto';
    protected $primaryKey='idProducto';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tDetalleVenta()
    {
      return $this->hasMany('App\Model\TDetalleVenta','idProducto');
    }

  }

 ?>