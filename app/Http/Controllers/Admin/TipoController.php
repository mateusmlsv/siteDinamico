<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('tipo_listar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $registros = Tipo::all();
        return view('admin.tipos.index',compact('registros'));
    }

    public function adicionar()
    {
        if(!auth()->user()->can('tipo_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request)
    {
        if(!auth()->user()->can('tipo_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$dados = $request->all();
        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];        

        $registro->save();
        
        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.tipos');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('tipo_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));	
    }

    public function atualizar(Request $request, $id)
    {
        if(!auth()->user()->can('tipo_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$registro = Tipo::find($id);
        $dados = $request->all();   
        $registro->titulo = $dados['titulo'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.tipos');
    }

    public function deletar($id)
    {
        if(!auth()->user()->can('tipo_deletar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        if(Imovel::where('cidade_id','=',$id)->count()){

            $msg = 'Não é possível deletar esse tipo de imóvel! Esse(s) imóvel(eis) (';
            $tipos = Imovel::where('tipo_id','=',$id)->get();

            foreach ($tipos as $tipo) {
                $msg .= $tipo->id.' ';
            }
            $msg .= ') esta(ão) relacionado(s).';
            \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);

            return redirect()->route('admin.tipos');            
        } 
    	Tipo::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.tipos');
    }
}
