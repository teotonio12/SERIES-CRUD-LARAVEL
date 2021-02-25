<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create(){
        return view('registro.create');
    }

    public function store(Request $request){
        
        $nome = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = User::create([
            'nome' => $nome,
            'email' => $email,
            'password' => $password
        ]);

        Auth::login($user);

        return redirect()->route('series.index');
    }
}
