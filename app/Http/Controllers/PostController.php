<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Str, Config, Image, Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Notifications\PostNotification;
use App\Events\PostEvent;


class PostController extends Controller
{   
    public function getNotification(){
        $postNotifications = auth()->user()->unreadNotifications;
        return view('admin.notification', compact('postNotifications'));
    }  

    public function postNotification(Request $request){
        $rules = [
            'description' => 'required',
        ]; 
        $messages = [
            'description.required' => 'Escriba un mensaje'
        ]; 
        $validator = validator::make($request->all(), $rules, $messages);
        if($validator->fails()): 
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger')->withInput();
        else: 
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $post = Post::create($data);

            //auth()->user()->notify(new PostNotification($post));
            // ahora enviaremos una notificacion a todos los usuarios excepto al que questa logueado
            //User::all()
            //    ->except($post->user_id)
            //    ->each(function(User $user) use ($post){
            //        $user->notify(new PostNotification($post));
            //});
            // hemos comentado lo anterior porque ahora llamaremos al evento
            event(new PostEvent($post));


            return back()->with('message', 'Mensaje enviado')->with('typealert', 'info')->withInput();
        endif;
        //return view('admin.notification');
    }


    public function getMensajeria(){
        $postNotifications = auth()->user()->unreadNotifications;
        return view('sitio.mensajeria', compact('postNotifications'));
    }

    public function markNotification(Request $request){
        Auth::user()->unreadNotifications
            ->when($request->input('id'), function($query) use ($request){
                return $query->where('id', $request->input('id'));
            })->markAsRead();
        
            return response()->noContent();
    }


}   
