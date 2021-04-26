<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clients;
use DB;

class ClientsController extends Controller
{
    //
    public function index(){
        $clients = Clients::all();
        return response()->json(['clients'=>$clients]);
    }

    public function store(Request $request){
        try{

            $client = DB::transaction( function() use($request) {

                $client = Clients::create( $request->all() );

                return compact('client');
            });

            return response()->json(['el cliente ha sido dado de alta exitosamente'=> $client ]);

        }catch(\Exception $exception){

            return response()->json(['No ha sido posible crear el cliente'=> $exception->getMessage() ]);

        }
    }

    public function update(Request $request, $id){

        
        try{

            $client = DB::transaction( function() use($request, $id){
                
                $client = Clients::findOrFail($id)->update( $request->all() );
                
                return $client;

            });

            return response()->json(['Cliente modificado correctamente'=>$client]);

        }catch(\Exception $exception){

            return response()->json(['No ha sido posible modificar el cliente'=> $exception->getMessage() ]);

        }
        
    }

    public function destroy($id){
        
        
        try{

            $client = Clients::find($id);

            $client->delete();

            return response()->json(["Cliente desactivado correctamente"=>$client]);

        }catch(\Exception $exception){
            return response()->json(['No ha sido posible desactivar el cliente'=> $exception->getMessage() ]);
        }
        

    }

}
