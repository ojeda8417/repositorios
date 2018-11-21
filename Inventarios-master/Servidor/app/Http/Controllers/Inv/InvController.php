<?php

namespace App\Http\Controllers\Inv;

use Auth;
use App\User;
use App\ArtDisponible;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class InvController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | UserController
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['cors','jwt.auth'/*,'jwt.refresh'*/]);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getArtExistencia(Request $request)
    {
        $limit = $request->input('data.limit');
        $offset = $request->input('data.offset');
        $order = $request->input('data.order');
        $orderBy = $request->input('data.sort');
        $search = json_decode($request->input('data.search'));

        //dd($search);
        $articulo = null;
        $descripcion = null;
        $fabricante = null;
        $grupo = null;
        $familia = null;
        $linea = null;
        $empresa = null;

        if($search) {
            $articulo = $search->articulo;
            $descripcion = $search->descripcion;
            $fabricante = $search->fabricante;
            $grupo = $search->grupo;
            $familia = $search->familia;
            $linea = $search->linea;
            $empresa = $search->empresa;
        }


        $usuario = Auth::user()->Usuario;
        $total = 0;
        
        //dd([$articulo,$descripcion,$fabricante,$grupo,$familia,$linea,$empresa,$usuario,$order,$orderBy,$limit,$offset]);

        $artDisponible = ArtDisponible::getDisponible($articulo,$descripcion,$fabricante,$grupo,$familia,$linea,
                                                      $empresa,$usuario,$order,$orderBy,$limit,$offset);



        if( (array)$artDisponible === $artDisponible ) {
            if(count($artDisponible)==0) {
                $status = 200;
            } else {
                if( property_exists($artDisponible[0],'Status') ) {
                    $status = $artDisponible[0]->Status;
                } else {
                    $status = 500;
                }

                if( property_exists($artDisponible[0],'Total') ) {
                    $total = $artDisponible[0]->Total;
                }
            }
        } else {
            $status = 500;
        }

        $result = new \stdClass();

        $result->total = $total;
        $result->rows = $artDisponible;

        return response()->json($result,$status);
    }

}