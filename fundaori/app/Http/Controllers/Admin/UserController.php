<?php

namespace App\Http\Controllers\Admin;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\CrearUsuario;
use App\User;  
use Validator, Str, Config, Image, Hash, Mail;

    
class UserController extends Controller 
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }


    public function getUsers($status){    
        $users_eraser = User::where('status', '0')->count();
        $users_public = User::where('status', '1')->count();

        if($status == 'all'):
            $users = User::orderBy('id', 'Desc')->paginate(30);
        else:  
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(30);
        endif;
        $data = [
            'users_eraser' => $users_eraser,
            'users_public' => $users_public,
            'users' => $users 
        ];
        return view('admin.users.home', $data);
    }


    public function getUserAdd(){
        return view('admin.users.add'); 
    }

    public function postUserAdd(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]; 
        $messages = [
            'name.required' => 'ingrese nombre del usuario',
            'lastname.required' => 'ingrese apellido del usuario',
            'email.required' => 'ingrese correo'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            if (User::where('email', $request->input('email'))->exists()) {
                return back()->with('message', 'el correo ya existe')->with('typealert', 'danger')->withInput();
            }
            else{
                $new_password = Str::random(8);

                $user = new User;                
                $user->name = e($request->input('name'));
                $user->lastname = e($request->input('lastname'));
                $user->email = e($request->input('email'));                
                $user->password = Hash::make($new_password);
                $user->status = 1;

                $data = [
                    'Nombre' => $request->input('name'),
                    'Apellido' => $request->input('lastname'),
                    'email' => $request->input('email'),
                    'Clave' => $new_password
                ];

                if($user->save()): 
                    Mail::to($request->input('email'))->send(new CrearUsuario($data));
                    return back()->with('message', 'usuario creado, la clave a sido enviado al correo '.$request->input('email'))->with('typealert', 'success');
                endif;
            }
        endif;
    }

    public function getUsersEdit($id){
        $u = User::findOrfail($id); 
        $data  = [
            'u' => $u
        ];
        return view('admin.users.user_edit', $data);  
    }







    public function getUserBanned($id){
        $u = User::findOrfail($id);
        if($u->status == "100"): 
            $u->status = "0";
            $msg = "usuario suspendido con éxito";
        else:
            $u->status = "100";
            $msg = "usuario activado con éxito";
        endif;
        if($u->save()): 
            return back()->with('message', $msg)->with('typealert', 'success');
        endif;
    }
    
    public function postUsersEdit(Request $request, $id){
        $u = User::findOrfail($id); 
        $u->role = $request->input('user_type');
        if($request->input('user_type') == "1"): 
            if(is_null($u->permissions)): 
                $permissions  = [
                    'dashboard' => true
                ];
                $permissions = json_encode($permissions);
                $u->permissions = $permissions;
            endif;
        else: 
            $u->permissions = null;
        endif;
        if($u->save()): 
            if($request->input('user_type') == "1"):
                return redirect('/administrar/user/'.$u->id.'/permissions')->with('se actualizó con éxito')->with('typealert', 'success');
            else: 
                return redirect('/administrar/users/all')->with('message', 'Tipo de usuario cambiado con éxito')->with('typealert', 'info');
            endif;
        endif;
    }
    

    public function getUsersPermissions($id){
        $u = User::findOrfail($id);
        $data  = [
            'u' => $u
        ];
        return view('admin.users.permissions', $data);
    }
   
      
    public function postUsersPermissions(Request $request, $id){
        $u = User::findOrfail($id);
        $permissions  = [
            'dashboard' => $request->input('dashboard'),
            'user_add' => $request->input('user_add'),
            'user_list' => $request->input('user_list'),
            'user_edit' => $request->input('user_edit'),
            'user_banned' => $request->input('user_banned'),
            'user_permissions' => $request->input('user_permissions'),
            'orders_list' => $request->input('orders_list'),
            'settings' => $request->input('settings'),
            'plantilla_add' => $request->input('plantilla_add')
        ];
        $permissions = json_encode($permissions);
        $u->permissions = $permissions;
        $msg = 'Los permisos de ususarios fueron actualizados con éxitos';
        if($u->save()): 
            return redirect('/users/1')->with('message', $msg)->with('typealert', 'success');
        endif;
    }
}
