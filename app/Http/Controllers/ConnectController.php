<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;
use App\User;  


class ConnectController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('getLogout');
    }
  
    public function getLogin(){
        return view('connect.login');
    }     

    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
        $messanges = [   
            'email.required' => 'su correo es requerido',
            'email.email' => 'su formato de correp es inválido',
            'email.unique' => 'ya existe un usuario con este correo registrado',
            'password.required' => 'Su contraeña es requerido',
            'password.min' => 'Su contraseña debe ser mayor a 8 carácteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messanges);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else: 
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                if(Auth::user()->status == "100"):
                    return redirect('/logout');
                else:
                    return redirect('/');
                endif;
            else: 
                return back()->with('message', 'correo o contraseña incorrecta')->with('typealert', 'danger');
            endif;
        endif;
    }


    public function getRegister(){
        return view('connect.register');
    }




    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ];   

        $messanges = [
            'name.required' => 'Su nombre es requerido',
            'lastname.required' => 'Su apellido es requerido',
            'email.required' => 'su correo es requerido',
            'email.email' => 'su formato de correp es inválido',
            'email.unique' => 'ya existe un usuario con este correo registrado',
            'password.required' => 'Su contraeña es requerido',
            'password.min' => 'Su contraseña debe ser mayor a 8 carácteres',
            'cpassword.required' => 'debe confirmar su contraseña',
            'cpassword.min' => 'la confirmación de la contraseña debe ser mayor a 8 carácteres',
            'cpassword.same' => 'las contraseñas no coinciden' 
        ];
        
        $validator = Validator::make($request->all(), $rules, $messanges);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else: 
            $user = new User;  
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if($user->save()): 
                return redirect('/ingresar')->with('message', 'su usuario se creó con éxito ahora puede iniciar sesión')->with('typealert', 'success');
            endif;
        endif;
    }
    
    public function getRecover(){   
        return view('email.recover');
    }




















    public function postRecover(Request $request){
        $rules = [
            'email' => 'required|email'
        ];
        $messanges = [
            'email.required' => 'su correo es requerido',
            'email.email' => 'su formato de correp es inválido'
        ];
        $validator = Validator::make($request->all(), $rules, $messanges);
        if($validator->fails()):    
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else: 
            $user = User::where('email', $request->input('email'))->count();
            if($user == "1"):
                //return 'buscando el email '.$request->input('email');
                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'code' => $code
                ];
                $u = User::find($user->id);
                $u->password_code = $code;
                if($u->save()):
                    Mail::to($user->email)->send(new UserSendRecover($data));
                    return redirect('/reset?email='.$user->email)->withErrors($validator)
                                                            ->with('message', 'hemos enviado un código a su correo electrónico')
                                                            ->with('typealert', 'success');
                endif;
                //return view('email.user_password_recover', $data);
            else: 
                return back()->withErrors($validator)->with('message', 'Este correo electrónico no existe')->with('typealert', 'danger');
            endif; 
        endif;
    }
   
    public function getReset(Request $request){
        $data = [
            'email' => $request->get('email')
        ];
        return view('email.reset', $data);
    }

    public function postReset(Request $request){
        $rules = [
            'email' => 'required|email',
            'code' => 'required'
        ];
        $messanges = [
            'email.required' => 'su correo es requerido',
            'email.email' => 'su formato de correp es inválido',
            'code.required' => 'el código de recuperación es requerido',
        ];
        $validator = Validator::make($request->all(), $rules, $messanges);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else: 
            $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->count();
            
            if($user == "1"):
                $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->first();
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;
                if($user->save()): 
                    $data = [
                        'name' => $user->name,
                        'new_password' => $new_password
                    ];
                    Mail::to($user->email)->send(new UserSendNewPassword($data));
                    return redirect('/ingresar')->withErrors($validator)
                                                                ->with('message', 'la contraseña fue restablecido con éxito, hemos enviado a su correo su nueva contraseña')
                                                                ->with('typealert', 'success');
                endif;
            else: 
                return back()->withErrors($validator)->with('message', 'correo electrónico o código de recuperacion inválido')->with('typealert', 'danger');
            endif;
        endif;
    }


    

    



    public function getLogout(){
        //$status = Auth::User()->status;
        Auth::logout();
        //if($status == "100"): 
            return redirect('/ingresar')->with('message', 'Su cuenta a sido cerrada')->with('typealert', 'danger');
        //else:
        //    return redirect('/');
        //endif;        
    }
}
