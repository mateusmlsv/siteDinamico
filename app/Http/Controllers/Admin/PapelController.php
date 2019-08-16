<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('papel_listar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$registros = Papel::all();
    	return view('admin.papel.index',compact('registros'));
    }

    public function adicionar()
    {
        if(!auth()->user()->can('papel_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	return view('admin.papel.adicionar');
    }

    public function salvar(Request $request)
    {
        if(!auth()->user()->can('papel_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	Papel::create($request->all());

    	\Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);
    	
    	return redirect()->route('admin.papel');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('papel_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }
        
    	if(Papel::find($id)->nome == 'admin'){
    		\Session::flash('mensagem',['msg'=>'Esse registro não pode ser alterado!','class'=>'red white-text']);
    		return redirect()->route('admin.papel');		
    	}

    	$registro = Papel::find($id);

    	return view('admin.papel.editar',compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        if(!auth()->user()->can('papel_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	if(Papel::find($id)->nome == 'admin'){
    		\Session::flash('mensagem',['msg'=>'Esse registro não pode ser alterado!','class'=>'red white-text']);
    		return redirect()->route('admin.papel');		
    	}

    	Papel::find($id)->update($request->all());

    	\Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.papel');
    }

    public function deletar($id)
    {
        if(!auth()->user()->can('papel_deletar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	if(Papel::find($id)->nome == 'admin'){
    		\Session::flash('mensagem',['msg'=>'Esse registro não pode ser deletado!','class'=>'red white-text']);
    		return redirect()->route('admin.papel');		
    	}

    	Papel::find($id)->delete();

    	\Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.papel');
    }

    public function permissao($id)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::all();

        return view('admin.papel.permissao',compact('papel','permissao'));
    }

    public function salvarPermissao(Request $request, $id)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::find($request['permissao_id']);

        $papel->adicionarPermissao($permissao);

        return redirect()->back();
    }

    public function removerPermissao($id, $id_permissao)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::find($id_permissao);

        $papel->removerPermissao($permissao);

        return redirect()->back();
    }
}
