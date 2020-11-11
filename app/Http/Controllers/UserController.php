<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Str, Config, Image, Auth, Hash;
use App\User;
class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
    }

    public function getAccountEdit(){
        //$birthday = explode('-', Auth::user()->birthday);
        $birthday = (is_null(Auth::user()->birthday)) ? [null, null, null] : explode('-', Auth::user()->birthday);
        $data = [
            'birthday' => $birthday
        ];
        return view('user.account', $data);
    }






    public function postAccountAvatar(Request $request){
        $rules = [
            'avatar' => 'required',
        ]; 
        $messages = [
            'avatar.required' => 'seleccione una imágen'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else: 
            if($request->hasFile('avatar')): 
                $path = '/'.Auth::user()->id;  
                $extension = trim($request->file('avatar')->getClientOriginalExtension());  
                $upload_path = Config::get('filesystems.disks.uploads_users.root');
                $name = Str::slug(str_replace($extension,'', $request->file('avatar')->getClientOriginalName()));

                $filename = rand(1,999).'_'.$name.'.'.$extension;
                $file_file = $upload_path.'/'.$path.'/'.$filename;

                $u = User::find(Auth::user()->id);
                $aa = $u->avatar;
                $u->avatar = $filename;
                if($u->save()): 
                    if($request->hasFile('avatar')): 
                        $fl = $request->avatar->storeAs($path, $filename, 'uploads_users');
                        $avatar = Image::make($file_file);
                        $avatar->fit(256, 256, function($constraint){
                            $constraint->upsize();
                        });
                        $avatar->save($upload_path.'/'.$path.'/av_'.$filename);
                        unlink($upload_path.'/'.$path.'/'.$aa);
                        unlink($upload_path.'/'.$path.'/av_'.$aa);
                        return back()->with('message', 'Avatar actualizado con éxito')->with('typealert', 'success');
                    endif;                    
                endif;
            endif;  
        endif;
    }

    public function postAccountPassword(Request $request){
        $rules = [
            'apassword' => 'required|min:8',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ]; 
        $messages = [
            'apassword.required' => 'Escriba su contraseña actual',
            'apassword.min' => 'Su contraseña actual debe tener al menos 8 caracáteres',
            'password.required' => 'Escriba su nueva contraseña',
            'password.min' => 'Su nueva contraseña debe tener al menos 8 caracáteres',
            'cpassword.required' => 'Confirme su nueva contraseña',
            'cpassword.min' => 'La confirmación para su nueva contrasela debe tener al menos 8 caracáteres',
            'cpassword.same' => 'las contrasseñas no coinciden'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $u = User::find(Auth::id());
            if(Hash::check($request->input('apassword'), $u->password)):
                $u->password = Hash::make($request->input('password'));
                if($u->save()):
                    return back()->with('message', 'Contraseña actualizada con exito')->with('typealert', 'success');
                endif;
            else:
                return back()->with('message', 'La contraseña actual es incorrecta')->with('typealert', 'danger');
            endif;
        endif;
    }



    public function postAccountInfo(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|min:9',
            'year' => 'required',
            'day' => 'required'
        ]; 
        $messages = [
            'name.required' => 'Escriba su nombre',
            'lastname.required' => 'Escriba su apellido',
            'phone.required' => 'Indique un teléfono',
            'phone.min' => 'el teléfono debe tener al menos 9 caracáteres',
            'year.required' => 'Escriba el año de nacimiento',
            'day.required' => 'Escriba el día de nacimiento'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else:
            $u = User::find(Auth::id());
            $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
            $u->name = e($request->input('name'));
            $u->lastname = e($request->input('lastname'));
            $u->phone = e($request->input('phone'));
            $u->birthday = date("Y-m-d", strtotime($date));
            $u->gender = $request->input('gender');
            if($u->save()):
                return back()->with('message', 'Información del usuario actualizada con éxito')->with('typealert', 'success');
            endif;
        endif;
    }






}