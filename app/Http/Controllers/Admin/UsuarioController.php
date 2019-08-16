<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Papel;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
    	$dados = $request->all();
    	
    	if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){

    		\Session::flash('mensagem',['msg'=>'Login realizado com sucesso!','class'=>'green white-text']);
    		
    		return redirect()->route('admin.principal');
    	}

		\Session::flash('mensagem',['msg'=>'Erro! Confira seus dados.','class'=>'red white-text']);

    	return redirect()->route('admin.login');
    	
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {   
        if(auth()->user()->can('usuario_listar')){ 
            if(auth()->user()->existeAdmin()){           
                $usuarios = User::all();
            }else{
                $usuarios = DB::table('users')->join('papel_user','users.id','=','papel_user.user_id')->where('papel_user.papel_id','<>','1')->get();
            }
            return view('admin.usuarios.index',compact('usuarios'));
        }else{
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }        
    }

    public function adicionar()
    {
        if(!auth()->user()->can('usuario_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }
            return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        if(!auth()->user()->can('usuario_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $dados = $request->all();
        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = Hash::make($dados['password']);

        $usuario->save();
        
        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('usuario_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request,$id)
    {
        if(!auth()->user()->can('usuario_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password'] > 5)){
            $dados['password'] = Hash::make($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario->update($dados);

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    public function deletar($id)
    {
        if(!auth()->user()->can('usuario_deletar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');   
    }

    public function papel($id)
    {
        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

    public function salvarPapel(Request $request, $id)
    {
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);

        return redirect()->back();
    }

    public function removerPapel($id, $papel_id)
    {
        $usuario = User::find($id);        
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);

        return redirect()->back();
    }
}
