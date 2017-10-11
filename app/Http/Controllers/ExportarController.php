<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TDetalleVenta;
use App\Model\TProducto;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Maatwebsite\Excel\Facades\Excel;
class ExportarController extends Controller
{
	
	public function actionExportPdf(Response $response,Request $request)
	{
		$consultaventafechas=TDetalleVenta::whereBetween('fechaVenta',[$request->input('dateinicial'),$request->input('datefinal')])->get();
		$pdf=app('FPDF');

		$pdf->AddPage();
		$pdf->Image('../public/logo/logo.jpg',10,8,33);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,40,'',0,1,'C');
		$i=0;

		$pdf->Cell(50,3*$i,'NOMBRE PRODUCTO');
		$pdf->Cell(40,3*$i,'CANTIDAD');
		$pdf->Cell(50,3*$i,'PRECIO UNITARIO');
		$pdf->Cell(40,3*$i,'FECHA VENTA',0,1,'C');
		$i++;
		$pdf->Cell(40,3*$i,'',0,1,'C');
		$pdf->Cell(40,3*$i,'',0,1,'C');
		$pdf->SetFont('Arial','',10);
		foreach ($consultaventafechas as $key => $value) {
			# code...
			$pdf->Cell(50,5*$i,$value->tproducto->nombreProducto);
			$pdf->Cell(40,5*$i,$value->cantidad);
			$pdf->Cell(50,5*$i,$value->precioUnitario);
			$pdf->Cell(40,5*$i,$value->fechaVenta,0,1,'C');
		}
		$headers=['Content-Type' => 'application/pdf'];

		return $response	->make($pdf->Output('I'), 200, $headers);
	}
	public function actionExportExcel()
	{
			$ListaPersonas=TPersona::all();

			Excel::create('Lista Personas', function($excel) use($ListaPersonas)
			{
			    $excel->sheet('Excel sheet', function($sheet) use($ListaPersonas)
			    {
			      $dato=[];
						array_push($dato,['NOMBRE','APELLIDOS','CORREO ELECTRONICO','ESTATURA']);
						foreach ($ListaPersonas as $key => $value) {
							# code...
							array_push($dato,[$value->nombre,$value->apellido,$value->correoElectronico,$value->estatura]);
						}
						$sheet->fromArray($dato,null,'A1',false,false);
			    });
			})->export('xlsx');
	}
	//pdf exel 1
	public function actionExportPdf1(Response $response,Request $request)
	{
		$productosRegistrados=TProducto::all();
		$pdf=app('FPDF');

		$pdf->AddPage();
		$pdf->Image('../public/logo/logo.jpg',10,8,33);

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,40,'',0,1,'C');
		$i=0;

		$pdf->Cell(30,3*$i,'NOMBRE');
		$pdf->Cell(40,3*$i,'DESCRIPCION');
		$pdf->Cell(20,3*$i,'STOCK');
		$pdf->Cell(50,3*$i,'PRECIO UNITARIO');
		$pdf->Cell(30,3*$i,'FECHA REGISTRO',0,1,'C');
		$i++;
		$pdf->Cell(40,3*$i,'',0,1,'C');
		$pdf->Cell(4500,3*$i,'',0,1,'C');
		$pdf->SetFont('Arial','',10);
		foreach ($productosRegistrados as $key => $value) {
			# code...
			$pdf->Cell(30,5*$i,$value->nombreProducto);
			$pdf->Cell(40,5*$i,$value->descripcion);
			$pdf->Cell(20,5*$i,$value->stock);
			$pdf->Cell(50,5*$i,$value->precio);
			$pdf->Cell(30,5*$i,$value->fechaRegistro,0,1,'C');
		}
		$headers=['Content-Type' => 'application/pdf'];

		return $response	->make($pdf->Output('I'), 200, $headers);
	}
	public function actionExportExcel1()
	{
			$productosRegistrados=TProducto::all();

			Excel::create('Lista Productos', function($excel) use($ListaPersonas)
			{
			    $excel->sheet('Excel sheet', function($sheet) use($ListaPersonas)
			    {
			      $dato=[];
						array_push($dato,['NOMBRE','DESCRIPCION','STOCK','PRECIO UNITARIO','FECHA REGISTRO']);
						foreach ($ListaPersonas as $key => $value) {
							# code...
							array_push($dato,[$value->nombreProducto,$value->descripcion,$value->stock,$value->precio,$value->fechaRegistro]);
						}
						$sheet->fromArray($dato,null,'A1',false,false);
			    });
			})->export('xlsx');
	}
}

?>
