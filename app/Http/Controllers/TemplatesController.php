<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Templates;
use DB;

class TemplatesController extends Controller
{
    //
    public function index(){

        $templates = Templates::all();

        return response()->json(['templates'=>$templates]);

    }

    public function store(Request $request){
        
        
        $template = Templates::create( $request->all() );

        return response()->json(['template'=>$template]);
        
    }

    public function update(Request $request, $id){

        
        try{

            $template = DB::transaction( function() use($request, $id){
                
                $template = Templates::findOrFail($id)->update( $request->all() );
                
                return $template;

            });

            return response()->json(['template modificado correctamente'=>$template]);

        }catch(\Exception $exception){

            return response()->json(['No ha sido posible modificar el template'=> $exception->getMessage() ]);

        }
        
    }

    public function destroy($id){
        
        
        try{

            $template = Templates::find($id);

            $template->delete();

            return response()->json(["Template desactivado correctamente"=>$template]);

        }catch(\Exception $exception){
            return response()->json(['No ha sido posible modificar el template'=> $exception->getMessage() ]);
        }
        

    }
}
