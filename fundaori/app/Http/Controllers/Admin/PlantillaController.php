<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\CrearUsuario;
use App\User;
use App\Http\Models\Dpersonales;  
use Validator, Str, Config, Image, Hash, Mail;
     
class PlantillaController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getPlantillaAdd(){
        $users = User::count();
        $data = [
            'users' => $users
        ];
        return view('admin.plantilla.add', $data);
    }

    public function postPlantillaAdd(Request $request){
        $rules = [
            'docident' => 'required',
            'fecnac' => 'required',
            'lugnac' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'profesion' => 'required',
            'nivedu' => 'required',
            'oficio' => 'required',
            'estado' => '',
            'email' => ''
        ]; 
        $messages = [
            'docident.required' => 'ingrese documento de identidad',
            'fecnac.required' => 'ingrese fecha de nacimiento',
            'lugnac.required' => 'ingrese lugar de nacimiento',
            'nombre.required' => 'ingrese nombre',
            'apellido.required' => 'ingrese  apellido',
            'profesion.required' => 'ingrese profesión',
            'nivedu.required' => 'ingrese  nivel de educacion',
            'oficio.required' => 'ingrese  oficio',
            'estado.required' => 'ingrese estado',
            'email.required' => 'ingrese correo'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if (Dpersonales::where('cedulaReligioso', $request->input('docident'))->exists()) {
                return back()->with('message', 'Esta cédula ya se encuentra registrada')->with('typealert', 'danger')->withInput();
            }
            else{
                $dpersonales = new Dpersonales;    

                $dpersonales->cedulaReligioso = e($request->input('docident'));
                $dpersonales->nombresReligioso = e($request->input('nombre'));
                $dpersonales->apellidosReligioso = e($request->input('apellido'));  
                $dpersonales->fechaNaciReligioso = e($request->input('fecnac'));

                $dpersonales->lugarNacimiento = e($request->input('name'));
                $dpersonales->direccion = e($request->input('lugnac'));
                $dpersonales->nivelEducaReligioso = e($request->input('nivedu'));
                $dpersonales->profesionOficioReligioso = e($request->input('profesion'));
                $dpersonales->nacionalidad_id = e($request->input('nacionalidad'));
                $dpersonales->genero_id = e($request->input('name'));
                $dpersonales->estadoCivil_id = e($request->input('estcivil'));
                $dpersonales->email = e($request->input('email'));
                $dpersonales->oficio = e($request->input('oficio'));
                $dpersonales->discapacidad = e($request->input('discapacidad'));
                $dpersonales->estado = e($request->input('estado'));
                $dpersonales->tlocal = e($request->input('tlocal'));
                $dpersonales->tmovil = e($request->input('tmovil'));     
                $dpersonales->genero_id = e($request->input('genero'));

                $data = [
                    'documentidentidad' => $request->input('docident'),
                    'nombre' => $request->input('nombre'),
                    'apellido' => $request->input('apellido'),
                    'email' => $request->input('email')
                ];

                if($dpersonales->save()): 
                    // Mail::to($request->input('email'))->send(new CrearUsuario($data));
                    return back()->with('message', 'Datos registrados con éxito')->with('typealert', 'success')->withInput();
                endif;                
            }    
        endif;
    }

}
