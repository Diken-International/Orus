<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sends;
use DB;

class SendsController extends Controller
{
    //
    public function index(){

        $sends = Sends::all();

        return response()->json(['sends'=>$sends]);
    }

    public function store(Request $request){
        try{

            $send = DB::transaction( function() use($request){
                
                
                $send = Sends::create( $request->all() );
                
                return compact('send');
                
                
            });

            return response()->json(['Send creado correctamente'=>$send]);

        }catch(\Exception $exception){

            return response()->json(['No ha sido posible crear el envio'=> $exception->getMessage() ]);

        }
    }
}
