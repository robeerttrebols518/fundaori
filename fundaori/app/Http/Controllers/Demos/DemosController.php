<?php

namespace App\Http\Controllers\Demos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Demo;
use App\Http\Models\DUser;
use Auth;


class DemosController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
    }
    public function getHome($id){        
        $user_id = Auth::user()->id;   // id del usuario
        $demo_id = $id; // id del demo
        $consulta = DUser::where('user_id', $user_id)->where('demo_id', $demo_id)->count();
        $regdemo = Demo::findOrFail($id);
        $data = [
            'consulta' => $consulta,
            'regdemo' => $regdemo
        ];

        $vista = 'demos.'.$id.'.home';
        
        if($consulta === 0):
            $add = New DUser;
            $add->user_id = $user_id;
            $add->demo_id = $id;
            if($add->save()):                 
                return view($vista, $data)->with('message', 'abriendo la plantilla nro: '.$id)->with('typealert', 'success');
            endif;
        else: 
            return view($vista, $data)->with('message', 'abriendo la plantilla nro: '.$id)->with('typealert', 'success');            
        endif;    
    }
    public function getAdmin($id){
        $demos = Demo::findOrFail($id);
        $data = [
            'demos' => $demos   
        ];
        return view('demos.admin.home', $data); 
    }
}
