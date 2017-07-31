<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recurso;
use App\puesto;
use App\usuarios;
use Mail;
use App\promocion;
use DB;

class promocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar()
    {
            $promocion=promocion::all();
        return view('registroPromocion', compact('promocion'));
    }

    
    public function guardar(Request $datos){
        $promocion = new promocion();
        $promocion->nombre=$datos->input('nombre');
        $promocion->descripcion=$datos->input('descripcion');
        $promocion->correo=$datos->input('correo');
      flash('!Registro con exito!')->important();
       flash('!Desea Agregar Otro')->success();
        $promocion->save();

        $config = array(
                'correo' => $datos->input('correo')
            
            );
        $nombrevista = "";

        if( $promocion->nombre=='maza'){
            $nombrevista = "promocionViajeMaza";
          
          }   else if($promocion->nombre=='europa'){
            $nombrevista = "promocionViajeEuropa";
            
            } else{  
         $nombrevista = "promocionViajeCancun";

            } 
            
         
        Mail::send($nombrevista, $config, function($message) use($config)
          {
            $message->from('testsantillan@gmail.com');
            $message->to($config['correo'],'usuario registrado');
            $message->subject('Bienvenidos');
          });

    
                flash('!Se ha enviado un mail! de promocion a su correo')->success();


        return redirect('consultarUsuarios');
    }

   
      public function consultar(){
        //$proyectos=Proyecto::all();
        $promocion=DB::table('promociones')
        ->select('promociones.*')
        ->get();
        return view('consultarPromocion', compact('promocion'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function eliminar($id){
        $promocion=promocion::find($id);
        $promocion->delete();
        flash('!promocion Eliminada!')->warning();

        return redirect('/consultarPromocion');

    }

     public function editar($id){
       // $promocion=promocion::find($id);
                $promocion = promocion::findOrFail($id);

        // $promocion=DB::table('promociones')
        // ->where('promociones.id','=', $id)
        // ->select('promociones.*')
        // ->first();
        // $promocion=promocion::all();

        return view('editarPromocion', compact('promocion'));

    }


      public function actualizar($id, Request $datos){
        $promocion=promocion::find($id);
        $promocion->nombre=$datos->input('nombre');
        $promocion->descripcion=$datos->input('descripcion');
        
        flash('!Recurso Actualizado!')->success();
        $promocion->save();

        return redirect('/consultarPromocion');

    }   
}
