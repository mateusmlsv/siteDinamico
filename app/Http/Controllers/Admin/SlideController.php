<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    public function index()
    {    
        if(!auth()->user()->can('slide_listar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $registros = Slide::orderBy('ordem')->get();
        return view('admin.slides.index',compact('registros'));
    }

    public function adicionar()
    {     
        if(!auth()->user()->can('slide_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	return view('admin.slides.adicionar');
    }

    public function salvar(Request $request)
    {    	   
        if(!auth()->user()->can('slide_adicionar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	if (Slide::count()) {
    		$slides = Slide::orderBy('ordem','desc')->first();

    		$ordemAtual = $slides->ordem;       	
    	}else{
    		$ordemAtual = 0;
    	}

        if($request->hasFile('imagens')){
        	$arquivos = $request->file('imagens');
        	foreach ($arquivos as $imagem) {        		
        		$registro = new Slide();

        		$rand = rand(11111,99999);
	    		$diretorio = 'img/slides/';
	    		$ext = $imagem->guessClientExtension();
	    		$nomeArquivo = '_img_'.$rand.'.'.$ext;
	    		$imagem->move($diretorio, $nomeArquivo);	    		    
	    		$registro->ordem = $ordemAtual + 1;        
	    		$ordemAtual++;
	    		$registro->imagem = $diretorio.'/'.$nomeArquivo;

        		$registro->save();        		        	
        	}
        }

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.slides');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('slide_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

        $registro = Slide::find($id);               
    	return view('admin.slides.editar',compact('registro'));        
    }

    public function atualizar(Request $request, $id)
    {
        if(!auth()->user()->can('slide_editar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$registro = Slide::find($id);
        $dados = $request->all();   
        
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];        
        $registro->link = $dados['link'];        
        $registro->ordem = $dados['ordem'];
        $registro->publicado = $dados['publicado'];

        $imovel = $registro->imovel;                        
        

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = 'img/slides/';
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = '_img_'.$rand.'.'.$ext;
    		$file->move($diretorio, $nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.slides');
    }

    public function deletar($id)
    {
        if(!auth()->user()->can('slide_deletar')){
            \Session::flash('mensagem',['msg'=>'Acesso negado!','class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }

    	$slide = Slide::find($id);    	
    	
    	$slide->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.slides');
    }
}
