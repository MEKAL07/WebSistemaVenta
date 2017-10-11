<?php
  namespace App\Model;
  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class TUsuario extends Model
  {
    protected $table='tusuario';
    protected $primaryKey='idUsuario';
    public $incrementing=true;
    public $timestamps=false;//controlamos nosotros y si es true controla larabel

    public function tVenta()
    {
      return $this->hasMany('App\Model\TVenta','idUsuario');
    }
  }

 ?>