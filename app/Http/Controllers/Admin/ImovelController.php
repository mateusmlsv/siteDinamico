<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use App\Cidade;


class ImovelController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('imovel_listar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }
        
        $registros = Imovel::all();
        return view('admin.imoveis.index',compact('registros'));
    }

    public function adicionar()
    {
        if(!auth()->user()->can('imovel_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$tipos = Tipo::all();
    	$cidades = Cidade::all();
    	return view('admin.imoveis.adicionar',compact('tipos','cidades'));
    }

    public function salvar(Request $request)
    {
        if(!auth()->user()->can('imovel_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$dados = $request->all();
    	//dd($dados);
        $registro = new Imovel();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];        
        $registro->status = $dados['status'];        
        $registro->endereco = $dados['endereco'];                
        $registro->cep = $dados['cep'];                
        $registro->valor = $dados['valor'];                
        $registro->dormitorios = $dados['dormitorios'];        
        $registro->detalhes = $dados['detalhes'];        
        $registro->visualizacoes = 0;
        $registro->publicar = $dados['publicar'];        
        if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
        	$registro->mapa = trim($dados['mapa']);
        }else{
        	$registro->mapa = null;
        }

        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = 'img/imoveis/'.str_slug($dados['titulo'],'_').'/';
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = '_img_'.$rand.'.'.$ext;
    		$file->move($diretorio, $nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}

        $registro->save();
        
        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imoveis');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('imovel_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $registro = Imovel::find($id);
        $tipos = Tipo::all();
    	$cidades = Cidade::all();
    	//dd($tipos,$cidades);
    	return view('admin.imoveis.editar',compact('registro','tipos','cidades'));        
    }

    public function atualizar(Request $request, $id)
    {
        if(!auth()->user()->can('imovel_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$registro = Imovel::find($id);
        $dados = $request->all();   
        //dd($dados);
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];        
        $registro->status = $dados['status'];        
        $registro->endereco = $dados['endereco'];                
        $registro->cep = $dados['cep'];                
        $registro->valor = $dados['valor'];                
        $registro->dormitorios = $dados['dormitorios'];        
        $registro->detalhes = $dados['detalhes'];                
        $registro->publicar = $dados['publicar'];        
        if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
        	$registro->mapa = trim($dados['mapa']);
        }else{
        	$registro->mapa = null;
        }

        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = 'img/imoveis/'.str_slug($dados['titulo'],'_').'/';
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = '_img_'.$rand.'.'.$ext;
    		$file->move($diretorio, $nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imoveis');
    }

    public function deletar($id)
    {           
        if(!auth()->user()->can('imovel_deletar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	Imovel::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imoveis');
    }
}
