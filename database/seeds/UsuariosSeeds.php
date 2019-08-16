<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email','=','admin@mail.com')->count()){
            $usuario = User::where('email','=','admin@mail.com')->first();            
            $usuario->name = "Mateus Leandro";
            $usuario->email = "admin@mail.com";
            $usuario->password = Hash::make("123456");
            $usuario->save();  
        }else{
            $usuario = new User();
            $usuario->name = "Mateus Leandro";
            $usuario->email = "admin@mail.com";
            $usuario->password = Hash::make("123");
            $usuario->save();            
        }
    }
}
