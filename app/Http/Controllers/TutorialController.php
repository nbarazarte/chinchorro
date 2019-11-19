<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tutorial;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PHPMailer;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
   
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function crearTutorial()
    {

        return \View::make('tutorial.crearTutorial');
    }

  /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCrearTutorial(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        $this->create($request->all());

        //return redirect($this->redirectPath()); 
        Session::flash('message','¡El tutorial ha sido creado con éxito!');
        return Redirect::to('/Crear-Tutorial'); 
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                
            'str_titulo' => 'required|max:255',
            'str_video' => 'required',   
            'str_post' => 'required',  
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $titulo = str_replace(" ","-",$data['str_titulo']);   

        $tutorial = Tutorial::create([

        'lng_idadmin' =>  Auth::user()->id, 
        'str_titulo' => $titulo,
        'str_post' => $data['str_post'],
        'str_video' => $data['str_video'],
        'str_estatus' => 'inactivo',
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function buscarTutorial()
    {

        $tutoriales = DB::table('tbl_tutorial as p')
                ->join('tbl_admin as adm', 'adm.id', '=', 'p.lng_idadmin')
                ->where('p.bol_eliminado', '=' ,0)
                ->select('p.id as idpost','p.str_estatus','adm.name as usuario','adm.blb_img as img_usuario','p.str_titulo', 'p.str_post', 'p.str_video', 'p.created_at as fecha')
                ->orderBy('p.id','asc')
                ->get();

            //dd($tutoriales);die();
        
        return \View::make('tutorial.buscarTutorial', compact('tutoriales'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function estatusTutorial($id, $estatus)
    {
    
        $estatusTutorial = DB::update('update tbl_post set str_estatus = "'.$estatus.'", lng_idadmin = '.Auth::user()->id.' where id = '.$id.' and bol_eliminado = 0');
         
        return $estatusTutorial;
    }

    public function verTutorial($id)
    {
    
        $tutoriales = DB::table('tbl_tutorial as p')
        ->where('p.id', '=', $id)
        ->Where(function ($query) {
            $query->where('p.bol_eliminado', '=', 0);
        })

        ->select( 'p.id as idpost','p.str_estatus', 'p.created_at as fecha','p.str_titulo', 'p.str_post','p.str_video')

        ->orderBy('p.id', 'desc')
        ->get(); 

        $tipoEstatus = DB::table('cat_datos_maestros')
            ->where('str_tipo', 'estatus_post')
            ->where('bol_eliminado', '=', 0)
            ->orderBy('id', 'asc')
            ->lists('str_descripcion');


        return \View::make('tutorial.tutorial', compact('tutoriales','tipoEstatus'));
    }

    public function editarTutorial(Request $request)
    {
        
        /*$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }*/

        $request["str_titulo"] = str_replace(" ","-",$request->str_titulo);
        $tutorial = Tutorial::find($request->id);
        $tutorial->fill($request->all());
        $tutorial->save();

        Session::flash('message','¡Se han editado los datos del tutorial con éxito!');
        return Redirect::to('/Ver-Tutorial-'.$request->id); 

    }

    public function editarMultimediaTutorial(Request $request)
    {
        
        $tutorial = Tutorial::find($request->id);
        $tutorial->fill($request->all());
        $tutorial->save();

        Session::flash('message','¡Se ha cambiado el contenido multimedia con éxito!');
        return Redirect::to('/Ver-Tutorial-'.$request->id); 

    }

    public function eliminarTutorial(Request $request)
    {
        
        $tutorial = DB::update('update tbl_tutorial set bol_eliminado = 1 where id = '.$request->id.' and bol_eliminado = 0');

        Session::flash('message','¡Se ha eliminado el tutorial con éxito!');
        return Redirect::to('/Buscar-Tutorial'); 

    }
}