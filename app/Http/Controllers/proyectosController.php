<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proyecto;
use App\Encargado;
use App\proyecto_recurso;
use DB;

class proyectosController extends Controller
{
    public function registrar(){
    	$encargados=Encargado::all();
        return view('registrarProyectos', compact('encargados'));
    }
    
     public function guardar(Request $datos){
    	$proyecto = new Proyecto();
        $proyecto->descripcion=$datos->input('descripcion');
        $proyecto->fecha_inicio=$datos->input('fecha_inicio');
        $proyecto->fecha_entrega=$datos->input('fecha_entrega');
        $proyecto->encargado_id=$datos->input('encargado');
        $proyecto->estado=$datos->input('estado');
        $proyecto->save();
       flash('!Registro con exito!')->important();
       flash('!Desea Agregar Otro')->success();

        return redirect('registrarProyecto');

    }
    public function consultar(){
    	//$proyectos=Proyecto::all();
    	$proyectos=DB::table('proyectos')
    	->join('encargados','proyectos.encargado_id','=','encargado_id')
    	->select('proyectos.*','encargados.nombre')
    	->get();
    	return view('consultarProyectos', compact('proyectos'));

    }
    
    public function eliminar($id){
    	$proyecto=Proyecto::find($id);
    	$proyecto->delete();
        //flash()->overlay('Estas seguro que desea eliminar!', 'Aceptar');
        flash('!El Proyecto Se Elimino!')->warning();


    	return redirect('/consultarProyectos');

    }

    public function editar($id){
        //$proyecto=Proyecto::find($id);
        $proyecto=DB::table('proyectos')
        ->where('proyectos.id','=', $id)
        ->join('encargados','encargados.id','=','proyectos.encargado_id')
        ->select('proyectos.*','encargados.nombre')
        ->first();
        $encargados=Encargado::all();

        return view('editarProyecto', compact('proyecto','encargados'));

    }

    public function actualizar($id, Request $datos){
        $proyecto=Proyecto:: find($id);
        $proyecto->descripcion=$datos->input('descripcion');
        $proyecto->fecha_inicio=$datos->input('fecha_inicio');
        $proyecto->fecha_entrega=$datos->input('fecha_entrega');
        $proyecto->encargado_id=$datos->input('encargado');
        $proyecto->estado=$datos->input('estado');
        $proyecto->save();
        flash('!Proyecto Actualizado!')->success();

        return redirect('/consultarProyectos');

    }
     
    public function pdf(){
        $proyectos=Proyecto::all();
        $vista=view('proyectosPDF', compact('proyectos'));
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        $pdf->setPaper('letter');
        flash('!Usted cerro Archivo PDF!')->success();
        return $pdf->stream('ListadoProyectos.pdf');
        
    }
     public function asignarRecurso($id){
        $proyecto=Proyecto::find($id);
        $lista=DB::table('proyectos_recursos')
        ->join('recursos','recursos.id','=','proyectos_recursos.recurso_id')
        ->where('proyectos_recursos.proyecto_id','=',$id)
        ->pluck('recursos.id');

        $recursosNoAsignados=DB::table('recursos')
        ->whereNotIn('recursos.id',$lista)
        ->select('recursos.nombre','recursos.id')
        ->get();

        $recursosAsignados=DB::table('recursos')
        ->whereIn('recursos.id',$lista)
        ->join('proyectos_recursos','recursos.id','=','proyectos_recursos.recurso_id')
        ->where('proyectos_recursos.proyecto_id','=',$id)
        ->select('recursos.nombre','recursos.id')
        ->get();


        return view('asignarRecurso',compact('proyecto','recursosNoAsignados','recursosAsignados'));
     }

     public function guardarAsignacion($id, Request $datos){
        $nuevo=new proyecto_recurso();
        $nuevo->recurso_id=$datos->input('recurso_id');
        $nuevo->proyecto_id=$id;
        $nuevo->save();
        flash('!El recurso se agrego con exito!')->success();

        return redirect('/asignarRecurso/'.$id); 
     }
      
      public function eliminarAsignacion($idr, $idp){
        DB::table('proyectos_recursos')
        ->where('proyectos_recursos.recurso_id','=',$idr)
        ->where('proyectos_recursos.proyecto_id','=',$idp)
        ->delete();
        flash('Recurso Eliminado')->warning();

        return redirect('/asignarRecurso/'.$idp);
      }
}

