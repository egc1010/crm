<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recurso;
use App\puesto;
use App\usuarios_promociones;
use App\usuarios;
use Mail;
use DB;

class usuariosController extends Controller
{
     public function registrar(){
    	$usuarios=usuarios::all();
        return view('registroUsuario', compact('usuarios'));
    }

     public function guardar(Request $datos){
    	$usuarios = new usuarios();
        $usuarios->nombre=$datos->input('nombre');
        $usuarios->correo=$datos->input('correo');
        $usuarios->edad=$datos->input('edad');
        $usuarios->sexo=$datos->input('sexo');
         $usuarios->pais=$datos->input('pais');
         $usuarios->estado=$datos->input('estado');
          $usuarios->estado_civil=$datos->input('estado_civil');
        $usuarios->hijos=$datos->input('hijos');
          $usuarios->trabajo=$datos->input('trabajo');
            $usuarios->intereses=$datos->input('intereses');

       // flash('!Registro con exito!')->important();
       // flash('!Desea Agregar Otro')->success();
        $usuarios->save();

        // $destinatario=$datos->input('correo')

        //    Mail::send(['text'=>'mail'],['name','lo que sea'],function($message){

        //     $message->to($destinatario)->subject('Promociones viajes');
        //     $message->from('egc1010@gmail.com','To emmanuel');

        // });

        $config = array(
                'correo' => $datos->input('correo')
            //'nombre' => $datos->input('nombre')
                
            );
        $nombrevista = "";

         if( $usuarios->sexo=='Hombre'){
           $nombrevista = "correoMasculino";
        }else{  
           $nombrevista = "correoFemenino";
       }
         
        Mail::send($nombrevista, $config, function($message) use($config)
          {
            $message->from('testsantillan@gmail.com');
            $message->to($config['correo'],'usuario registrado');
            $message->subject('Bienvenidos');
          });

        // Mail::send('emails.welcome', $data, function($message)
        // {
        //     $message->to('example@outlook.com')
        //     ->subject('Hi there!  Laravel sent me!');
        // });
                flash('!Se ha enviado un mail! de registro a su correo')->success();


        return redirect('registroUsuario');
    }

    public function consultar(){
    	//$proyectos=Proyecto::all();
    	$usuarios=DB::table('usuarios')
    	->select('usuarios.*')
    	->get();
    	return view('consultarUsuarios', compact('usuarios'));

    }

     public function eliminar($id){
    	$usuarios=usuarios::find($id);
    	$usuarios->delete();
        flash('!Usuario Eliminado!')->warning();

    	return redirect('/consultarUsuarios');

    }

    public function editar($id){
     //   $usuarios=usuarios::find($id);

        $usuarios = usuarios::findOrFail($id);
     //   $usuarios=DB::table('usuarios')
        /*$usuarios = DB::select('select * from usuarios where id = ?', $id);*/
     //   ->where('usuarios.id','=', $id)
      //  ->select('usuarios.nombre')

       // ->first();

    //    $usuarios=usuarios::all(); 
       

        return view('editarUsuario', compact('usuarios'));

    }

    public function actualizar($id, Request $datos){
        $usuarios=usuarios::find($id);
        $usuarios->nombre=$datos->input('nombre');
        $usuarios->correo=$datos->input('correo');
        $usuarios->edad=$datos->input('edad');
        $usuarios->sexo=$datos->input('sexo');
         $usuarios->pais=$datos->input('pais');
         $usuarios->estado=$datos->input('estado');
          $usuarios->estado_civil=$datos->input('estado_civil');
        $usuarios->hijos=$datos->input('hijos');
          $usuarios->trabajo=$datos->input('trabajo');
            $usuarios->intereses=$datos->input('intereses');
            
        flash('!usuario Actualizado!')->success();
        $usuarios->save();

        return redirect('/consultarUsuarios');

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


 public function enviarmail(Request $datos)
    {
                $usuarios = new usuarios();

       

/*        $usuarios = new usuarios();|
        $length = count($array);


        for ($i =0; $usuarios; $i <$usuarios.$length ; $i++) {
 
    $correo=$usuarios[$i][$correo]

}

$array = array("Jonathan","Sampson");

foreach($usuarios as $usuarios) {
  print $value;
}
*/

foreach( $usuarios as $usuarios) {

         $config = array(
                'correo' => $datos->input('correo')
            //'nombre' => $datos->input('nombre')
                
            );  
        $nombrevista = "";

         if( $usuarios->sexo=='Hombre') {
           $nombrevista = "promocionViajeMaza";
        } elseif ($usuarios->hijos>='2') {
            $nombrevista="promocionViajeCancun";
         }  
         else {
           $nombrevista = "promocionViajeEuropa";
           }
      
         
        Mail::send($nombrevista, $config, function($message) use($config)
          {
            $message->from('testsantillan@gmail.com');
            $message->to($config['correo'],'usuario registrado');
            $message->subject('Promocion');
          });

               

        
        flash('!Usted envio un mail!')->success();
        return redirect('/consultarUsuarios');

    } 


}



public function asignarRe($id){
        $usuarios=usuarios::find($id);
        $lista=DB::table('usuarios_promociones')
        ->join('usuarios','usuarios.id','=','usuarios_promociones.usuarios_id')
        ->where('usuarios_promociones.promociones_id','=',$id)
        ->pluck('usuarios.id');

        $recursosNoAsig=DB::table('usuarios')
        ->whereNotIn('usuarios.id',$lista)
        ->select('usuarios.sexo','usuarios.id')
        ->get();

        $recursosAsig=DB::table('usuarios')
        ->whereIn('usuarios.id',$lista)
        ->join('usuarios_promociones','usuarios.id','=','usuarios_promociones.usuarios_id')
        ->where('usuarios_promociones.promociones_id','=',$id)
        ->select('usuarios.nombre','usuarios.id')
        ->get();


        return view('asignarPromo',compact('usuarios','recursosNoAsig','recursosAsig'));
     }

     public function guardarAsig($id, Request $datos){
        $nuevo= new usuarios_promociones();
        $nuevo->usuarios_id=$id;
        $nuevo->promociones_id=$id;
        $nuevo->save();
        flash('!El recurso se agrego con exito!')->success();

        return redirect('/asignarPromo/'.$id); 
     }
      
      public function eliminarAsig($idr, $idp){
        DB::table('usuarios_promociones')
        ->where('usuarios_promociones.usuarios_id','=',$idr)
        ->where('usuarios_promociones.promociones_id','=',$idp)
        ->delete();
        flash('Recurso Eliminado')->warning();

        return redirect('/asignarPromo/'.$idp);
      }
}