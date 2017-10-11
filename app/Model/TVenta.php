<?php
	namespace App\Model;
    use Illuminate\Database\Eloquent\Model;

    /**
     * 
     */
     class TVenta extends Model
     {
     	
     	protected $table='tventa';
	    protected $primaryKey='idVenta';
	    public $incrementing=true;
	    public $timestamps=false;//controlamos nosotros y si es true controla larabel

	    public function tUsuario()
	    {
	    	return $this->belongsTo('App\Model\TUsuario','idUsuario');
	    }
	    public function tCliente()
	    {
	    	return $this->belongsTo('App\Model\TCliente','dniCliente');
	    }
     } 
 ?>