<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recurso;
use App\puesto;
use App\usuarios;
use DB;

class recursosController extends Controller
{
     public function registrar(){
    	$puestos=puesto::all();
        return view('registrarRecursos', compact('puestos'));
    }

     public function guardar(Request $datos){
    	$recurso = new recurso();
        $recurso->nombre=$datos->input('nombre');
        $recurso->correo=$datos->input('correo');
        $recurso->edad=$datos->input('edad');
        $recurso->puesto_id=$datos->input('puesto');
       flash('!Registro con exito!')->important();
       flash('!Desea Agregar Otro')->success();
        $recurso->save();

        return redirect('registrarRecursos');
    }

    public function consultar(){
    	//$proyectos=Proyecto::all();
    	$recursos=DB::table('recursos')
    	->join('puestos','recursos.puesto_id','=','puesto_id')
    	->select('recursos.*','puestos.descripcion')
    	->get();
    	return view('consultarRecursos', compact('recursos'));

    }

     public function eliminar($id){
    	$recurso=recurso::find($id);
    	$recurso->delete();
        flash('!Recurso Eliminado!')->warning();

    	return redirect('/consultarRecursos');

    }

    public function editar($id){
        //$proyecto=Proyecto::find($id);
        $recursos=DB::table('recursos')
        ->where('recursos.id','=', $id)
        ->join('puestos','puestos.id','=','recursos.puesto_id')
        ->select('recursos.*','puestos.descripcion')
        ->first();
        $puestos=puesto::all();

        return view('editarRecurso', compact('recursos','puestos'));

    }

    public function actualizar($id, Request $datos){
        $recurso=recurso::find($id);
        $recurso->nombre=$datos->input('nombre');
        $recurso->correo=$datos->input('correo');
        $recurso->edad=$datos->input('edad');
        $recurso->puesto_id=$datos->input('puesto');
        flash('!Recurso Actualizado!')->success();
        $recurso->save();

        return redirect('/consultarRecursos');

    }
     
    public function pdf(){
        $recursos=recurso::all();
        $vista=view('recursosPDF', compact('recursos'));
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        $pdf->setPaper('letter');
        flash('!Usted cerro Archivo PDF!')->success();
        return $pdf->stream('ListadoRecurso.pdf');
        
    }

}
