<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    
    
    public function index ()
    {
        return view('entrar.index');
    }
    
    public function entrar(Request $request){
        
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        
        if (!Auth::attempt($credentials)){
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorreta');
        } 

        return redirect()->route('series.index');
    }

    public function sair(){
        Auth::logout();
        return redirect('/entrar'); 
    }
}
