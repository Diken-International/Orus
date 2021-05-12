<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Clients;
use App\Models\Templates;

class MailableController extends Controller
{
    //
    public function index(Request $request){

    	$data = $request->all();
    	

    	$template = Templates::where('client_id',$data['template_id'])->first();
         
       	return response()->json(['template'=>$template]);
    }
}
