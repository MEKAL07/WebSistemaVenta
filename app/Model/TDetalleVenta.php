<?php
	namespace App\Model;
    use Illuminate\Database\Eloquent\Model;

    /**
     * 
     */
     class TDetalleVenta extends Model
     {
     	
     	protected $table='tdetalleventa';
	    protected $primaryKey='idDetalle';
	    public $incrementing=true;
	    public $timestamps=false;//controlamos nosotros y si es true controla larabel

	    public function tVenta()
	    {
	    	return $this->belongsTo('App\Model\TVenta','idVenta');
	    }
	    public function tProducto()
	    {
	    	return $this->belongsTo('App\Model\TProducto','idProducto');
	    }
     } 
 ?>