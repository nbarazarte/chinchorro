<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Noticias;
use App\CategoriasNoticias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PHPMailer;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class NoticiasController extends Controller
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
    public function crearNoticia()
    {

        $autores = DB::table('tbl_autores')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })              
        ->orderBy('str_nombre')
        ->select('str_nombre','id')
        ->lists('str_nombre','id');

        $etiquetas = DB::table('cat_datos_maestros')
        ->where('str_tipo', '=' ,'etiqueta')
        ->Where(function ($query) {
            $query->where('bol_eliminado', '=', 0);
        })              
        ->orderBy('str_descripcion')
        ->select('str_descripcion','id')
        ->lists('str_descripcion','id');

        //dd($etiquetas);die(); 

        return \View::make('noticias.crearNoticia', compact('autores','etiquetas'));
    }

  /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCrearNoticia(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        $this->create($request->all());

        //return redirect($this->redirectPath()); 
        Session::flash('message','¡La noticia ha sido creado con éxito!');
        return Redirect::to('/Crear-Noticias'); 
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        if($data['str_tipo'] == 'imagen'){

            return Validator::make($data, [
                    
                'str_tipo' => 'required|max:255',
                'lng_idautor' => 'required|max:255',
                'str_titulo' => 'required|max:255',
                'str_post_resumen' => 'required', 
                'str_post' => 'required',
                'blb_img1' => 'required',      

            ]);            
            
        }else if($data['str_tipo'] == 'carrusel-imagen'){

            return Validator::make($data, [
                    
                'str_tipo' => 'required|max:255',
                'lng_idautor' => 'required|max:255',
                'str_titulo' => 'required|max:255',
                'str_post_resumen' => 'required', 
                'str_post' => 'required',
                'blb_img1' => 'required',
                'blb_img2' => 'required',
                /*'blb_img3' => 'required',*/          

            ]);              

        }else if($data['str_tipo'] == 'video'){

            return Validator::make($data, [
                    
                'str_tipo' => 'required|max:255',
                'lng_idautor' => 'required|max:255',
                'str_titulo' => 'required|max:255',
                'str_post_resumen' => 'required', 
                'str_post' => 'required', 
                'str_video' => 'required',     

            ]);              
        
        }else if($data['str_tipo'] == 'audio'){
        
            return Validator::make($data, [
                    
                'str_tipo' => 'required|max:255',
                'lng_idautor' => 'required|max:255',
                'str_titulo' => 'required|max:255',
                'str_post_resumen' => 'required', 
                'str_post' => 'required',
                'str_audio' => 'required',      

            ]);          
        }else{

            return Validator::make($data, [
                    
                'str_tipo' => 'required|max:255',
                'lng_idautor' => 'required|max:255',
                'str_titulo' => 'required|max:255',
                'str_post_resumen' => 'required', 
                'str_post' => 'required',      

            ]); 

        }
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
           
        if($data['str_tipo'] == 'simple'){

            //echo Auth::user()->id;
            //die();

            $post = Noticias::create([

            'lng_idadmin' =>  Auth::user()->id,    
            'str_tipo' =>  $data['str_tipo'],
            'lng_idautor' =>  $data['lng_idautor'],
            'str_titulo' => $titulo,
            'str_post_resumen' => $data['str_post_resumen'],
            'str_post' => $data['str_post'],
            'str_estatus' => 'inactivo',
            ]);

        }else if($data['str_tipo'] == 'imagen'){ 

            $img1 = base64_encode(file_get_contents($data['blb_img1']));      

            $post = Noticias::create([

            'lng_idadmin' =>  Auth::user()->id,
            'str_tipo' =>  $data['str_tipo'],
            'lng_idautor' =>  $data['lng_idautor'],
            'str_titulo' => $titulo,
            'str_post_resumen' => $data['str_post_resumen'],
            'str_post' => $data['str_post'],
            'blb_img1' => $img1,
            'str_estatus' => 'inactivo',
            ]); 

        }else if($data['str_tipo'] == 'carrusel-imagen'){

            $img1 = base64_encode(file_get_contents($data['blb_img1']));
            $img2 = base64_encode(file_get_contents($data['blb_img2']));

            if(empty($data['blb_img3'])){

                $img3 = $data['blb_img3'];
            }else{
                $img3 = base64_encode(file_get_contents($data['blb_img3']));
            } 

            $post = Noticias::create([

            'lng_idadmin' =>  Auth::user()->id,
            'str_tipo' =>  $data['str_tipo'],
            'lng_idautor' =>  $data['lng_idautor'],
            'str_titulo' => $titulo,
            'str_post_resumen' => $data['str_post_resumen'],
            'str_post' => $data['str_post'],
            'blb_img1' => $img1,
            'blb_img2' => $img2,
            'blb_img3' => $img3,
            'str_estatus' => 'inactivo',
            ]); 

        }else if($data['str_tipo'] == 'video'){

            $post = Noticias::create([

            'lng_idadmin' =>  Auth::user()->id, 
            'str_tipo' =>  $data['str_tipo'],
            'lng_idautor' =>  $data['lng_idautor'],
            'str_titulo' => $titulo,
            'str_post_resumen' => $data['str_post_resumen'],
            'str_post' => $data['str_post'],
            'str_video' => $data['str_video'],
            'str_estatus' => 'inactivo',
            ]); 

        }else if($data['str_tipo'] == 'audio'){

            $post = Noticias::create([

            'lng_idadmin' =>  Auth::user()->id,    
            'str_tipo' =>  $data['str_tipo'],
            'lng_idautor' =>  $data['lng_idautor'],
            'str_titulo' => $titulo,
            'str_post_resumen' => $data['str_post_resumen'],
            'str_post' => $data['str_post'],
            'str_audio' => $data['str_audio'],
            'str_estatus' => 'inactivo',
            ]); 

        }

        $lastInsertedId = $post->id;

        if(!empty($data['str_categoria'])){

            //dd($data['str_categoria']);
            //die();

            $categorias = array_values($data['str_categoria']);
            
            $total_categorias = count($categorias);
            
            for ($i = 0; $i <= $total_categorias - 1; $i++)
            {
                $categoriasPost = CategoriasNoticias::create([
                    'lng_idnoticias' => $lastInsertedId,
                    'str_categoria' => $categorias[$i],
                ]);
            }

            return $categoriasPost;

        }else{

            return $post;

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function buscarNoticia()
    {

        $noticias = DB::table('tbl_noticias as p')
                ->join('tbl_autores as au', 'au.id', '=', 'p.lng_idautor')
                ->join('tbl_admin as adm', 'adm.id', '=', 'p.lng_idadmin')
                ->where('p.bol_eliminado', '=' ,0)
                ->select('p.id as idpost','p.str_estatus','adm.name as usuario','adm.blb_img as img_usuario','p.str_titulo', 'p.str_post', 'p.str_post_resumen', 'p.str_tipo', 'p.str_video','p.str_audio', 'p.blb_img1', 'p.blb_img2', 'p.blb_img3', 'p.created_at as fecha', 'au.id', 'au.str_nombre as autor', 'au.str_genero', 'au.str_profesion', 'au.str_cv', 'au.blb_img')
                ->orderBy('p.id','asc')
                ->get();

            //dd($noticias);die();
        
        return \View::make('noticias.buscarNoticia', compact('noticias'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function estatusNoticias($id, $estatus)
    {
    
        $estatusNoticias = DB::update('update tbl_noticias set str_estatus = "'.$estatus.'", lng_idadmin = '.Auth::user()->id.' where id = '.$id.' and bol_eliminado = 0');
         
        return $estatusNoticias;
    }

    public function verNoticia($id)
    {
    
        $noticias = DB::table('tbl_noticias as p')
        ->join('tbl_autores as a', 'p.lng_idautor', '=', 'a.id')
        ->where('p.id', '=', $id)
        ->Where(function ($query) {
            $query->where('p.bol_eliminado', '=', 0);
        })

        ->select( 'p.id as idpost','p.str_estatus','p.str_tipo', 'p.created_at as fecha','p.str_titulo', 'p.str_post', 'p.str_post_resumen','p.str_video', 'p.str_audio', 'p.blb_img1', 'p.blb_img2', 'p.blb_img3', 'a.str_nombre as autor')

        ->orderBy('p.id', 'desc')
        ->get(); 
              
        $autores = DB::table('tbl_autores')
            ->orderBy('str_nombre', 'asc')
            ->where('bol_eliminado', '=', 0)
            ->select('str_nombre','id')
            ->lists('str_nombre','id');

        $tipopost = DB::table('cat_datos_maestros')
            ->where('str_tipo', 'post')
            ->where('bol_eliminado', '=', 0)
            ->orderBy('id', 'asc')
            ->lists('str_descripcion');

        $tipoEstatus = DB::table('cat_datos_maestros')
            ->where('str_tipo', 'estatus_post')
            ->where('bol_eliminado', '=', 0)
            ->orderBy('id', 'asc')
            ->lists('str_descripcion');


        $todasEtiquetas = DB::table('cat_datos_maestros')
            ->where('str_tipo', '=' ,'etiqueta')
            ->Where(function ($query) {
                $query->where('bol_eliminado', '=', 0);
            })              
            ->orderBy('str_descripcion')
            ->select('str_descripcion','id')
            ->lists('str_descripcion','id');


        $etiquetas = DB::table('tbl_categorias_noticias as cat')
        ->where('cat.lng_idnoticias', '=', $id)
        ->orderBy('str_categoria')
        ->select('str_categoria')
        ->lists('str_categoria');          

        //dd($todasEtiquetas);

        return \View::make('noticias.noticia', compact('noticias','categorias','autores','tipopost','todasEtiquetas','etiquetas','tipoEstatus'));
    }

    public function editarNoticia(Request $request)
    {
        
        /*$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }*/

        $request["str_titulo"] = str_replace(" ","-",$request->str_titulo);
        $post = Noticias::find($request->id);
        $post->fill($request->all());
        $post->save();

        Session::flash('message','¡Se han editado los datos de la noticia con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id); 

    }

    public function editarMultimedia(Request $request)
    {
    
        $validator = $this->validatorImagen($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $blb_img1 = base64_encode(file_get_contents($request->blb_img1));
        $publicacion = DB::update("update tbl_noticias set str_tipo = '".$request->str_tipo."', blb_img1 = '".$blb_img1."' where id = ".$request->id);

        Session::flash('message','¡Se ha cambiado la imágen de la noticia con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id); 

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorImagen(array $data)
    {
        return Validator::make($data, [
                
            'blb_img1' => 'required' 
        ]);
    }

    public function editarMultimedia2(Request $request)
    {
        
        $validator = $this->validatorCarrusel($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $blb_img1 = base64_encode(file_get_contents($request->blb_img1));
        $blb_img2 = base64_encode(file_get_contents($request->blb_img2));
        $blb_img3 = base64_encode(file_get_contents($request->blb_img3));

        $publicacion = DB::update("update tbl_noticias set str_tipo = '".$request->str_tipo."', blb_img1 = '".$blb_img1."', blb_img2 = '".$blb_img2."', blb_img3 = '".$blb_img3."' where id = ".$request->id);

        Session::flash('message','¡Se ha cambiado la imágen de la noticia con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id); 

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorCarrusel(array $data)
    {
        return Validator::make($data, [
                
            'blb_img1' => 'required',
            'blb_img2' => 'required',
            'blb_img3' => 'required',    

        ]);
    }

    public function editarMultimedia3(Request $request)
    {
        
        $validator = $this->validatorAudioVideo($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $post = Noticias::find($request->id);
        $post->fill($request->all());
        $post->save();

        Session::flash('message','¡Se ha cambiado el contenido multimedia con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id); 

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorAudioVideo(array $data)
    {
        
        //dd($data);
        //echo $data['str_tipo'];
        //die();

        if($data['str_tipo'] == 'video'){

            return Validator::make($data, [
                    
                'str_video' => 'required',
       
            ]);

        }else{

            return Validator::make($data, [
                    
                'str_audio' => 'required',
       
            ]);            
        }

    }    

    public function editarMultimedia4(Request $request)
    {
        
        /*$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }*/

        $post = Noticias::find($request->id);
        $post->fill($request->all());
        $post->save();

        Session::flash('message','¡Se ha quitado el contenido multimedia con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id); 

    }

    public function editarEtiquetas(Request $request)
    {
        
        $categoriasPostActuales = DB::table('tbl_categorias_noticias')
            ->where('lng_idnoticias', '=', $request->id)
            ->delete();

        //dd($request);die();

        $categorias = array_values($request->str_categoria);
        
        $total_categorias = count($categorias);
        
        for ($i = 0; $i <= $total_categorias - 1; $i++)
        {
            $categoriasPost = CategoriasNoticias::create([
                'lng_idnoticias' => $request->id,
                'str_categoria' => $categorias[$i],
            ]);
        }

        Session::flash('message','¡Se han editado las etiquetas con éxito!');
        return Redirect::to('/Ver-Noticia-'.$request->id);   
    }

    public function eliminarNoticias(Request $request)
    {
        
        $post = DB::update('update tbl_noticias set bol_eliminado = 1 where id = '.$request->id.' and bol_eliminado = 0');

        Session::flash('message','¡Se ha eliminado la noticia con éxito!');
        return Redirect::to('/Buscar-Noticias'); 

    }

}