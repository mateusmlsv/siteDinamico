<?php

use Illuminate\Database\Seeder;
use App\Permissao;
class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Permissao::where('nome','=','usuario_listar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_listar',
        		'descricao'=>'Listar usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_listar')->first();
        	$permissao->update([
        		'nome'=>'usuario_listar',
        		'descricao'=>'Listar usuários'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_adicionar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_adicionar',
        		'descricao'=>'Adicionar usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_adicionar')->first();
        	$permissao->update([
        		'nome'=>'usuario_adicionar',
        		'descricao'=>'Adicionar usuários'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_editar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_editar',
        		'descricao'=>'Editar usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_editar')->first();
        	$permissao->update([
        		'nome'=>'usuario_editar',
        		'descricao'=>'Editar usuários'
        	]);
        }

        if(!Permissao::where('nome','=','usuario_deletar')->count()){
        	Permissao::create([
        		'nome'=>'usuario_deletar',
        		'descricao'=>'Deletar usuários'
        	]);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_deletar')->first();
        	$permissao->update([
        		'nome'=>'usuario_deletar',
        		'descricao'=>'Deletar usuários'
        	]);
        }

        //cidades
        if(!Permissao::where('nome','=','cidade_listar')->count()){
            Permissao::create([
                'nome'=>'cidade_listar',
                'descricao'=>'Listar cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','cidade_listar')->first();
            $permissao->update([
                'nome'=>'cidade_listar',
                'descricao'=>'Listar cidades'
            ]);
        }

        if(!Permissao::where('nome','=','cidade_adicionar')->count()){
            Permissao::create([
                'nome'=>'cidade_adicionar',
                'descricao'=>'Adicionar cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','cidade_adicionar')->first();
            $permissao->update([
                'nome'=>'cidade_adicionar',
                'descricao'=>'Adicionar cidades'
            ]);
        }

        if(!Permissao::where('nome','=','cidade_editar')->count()){
            Permissao::create([
                'nome'=>'cidade_editar',
                'descricao'=>'Editar cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','cidade_editar')->first();
            $permissao->update([
                'nome'=>'cidade_editar',
                'descricao'=>'Editar cidades'
            ]);
        }

        if(!Permissao::where('nome','=','cidade_deletar')->count()){
            Permissao::create([
                'nome'=>'cidade_deletar',
                'descricao'=>'Deletar cidades'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','cidade_deletar')->first();
            $permissao->update([
                'nome'=>'cidade_deletar',
                'descricao'=>'Deletar cidades'
            ]);
        }

        //tipos
        if(!Permissao::where('nome','=','tipo_listar')->count()){
            Permissao::create([
                'nome'=>'tipo_listar',
                'descricao'=>'Listar tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','tipo_listar')->first();
            $permissao->update([
                'nome'=>'tipo_listar',
                'descricao'=>'Listar tipos'
            ]);
        }

        if(!Permissao::where('nome','=','tipo_adicionar')->count()){
            Permissao::create([
                'nome'=>'tipo_adicionar',
                'descricao'=>'Adicionar tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','tipo_adicionar')->first();
            $permissao->update([
                'nome'=>'tipo_adicionar',
                'descricao'=>'Adicionar tipos'
            ]);
        }

        if(!Permissao::where('nome','=','tipo_editar')->count()){
            Permissao::create([
                'nome'=>'tipo_editar',
                'descricao'=>'Editar tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','tipo_editar')->first();
            $permissao->update([
                'nome'=>'tipo_editar',
                'descricao'=>'Editar tipos'
            ]);
        }

        if(!Permissao::where('nome','=','tipo_deletar')->count()){
            Permissao::create([
                'nome'=>'tipo_deletar',
                'descricao'=>'Deletar tipos'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','tipo_deletar')->first();
            $permissao->update([
                'nome'=>'tipo_deletar',
                'descricao'=>'Deletar tipos'
            ]);
        }

        //papel
        if(!Permissao::where('nome','=','papel_listar')->count()){
            Permissao::create([
                'nome'=>'papel_listar',
                'descricao'=>'Listar papeis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_listar')->first();
            $permissao->update([
                'nome'=>'papel_listar',
                'descricao'=>'Listar papeis'
            ]);
        }

        if(!Permissao::where('nome','=','papel_adicionar')->count()){
            Permissao::create([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar papeis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_adicionar')->first();
            $permissao->update([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar papeis'
            ]);
        }

        if(!Permissao::where('nome','=','papel_editar')->count()){
            Permissao::create([
                'nome'=>'papel_editar',
                'descricao'=>'Editar papeis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_editar')->first();
            $permissao->update([
                'nome'=>'papel_editar',
                'descricao'=>'Editar papeis'
            ]);
        }

        if(!Permissao::where('nome','=','papel_deletar')->count()){
            Permissao::create([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar papeis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_deletar')->first();
            $permissao->update([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar papeis'
            ]);
        }

        //páginas
        if(!Permissao::where('nome','=','pagina_listar')->count()){
            Permissao::create([
                'nome'=>'pagina_listar',
                'descricao'=>'Listar paginas'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_listar')->first();
            $permissao->update([
                'nome'=>'pagina_listar',
                'descricao'=>'Listar paginas'
            ]);
        }

        if(!Permissao::where('nome','=','pagina_adicionar')->count()){
            Permissao::create([
                'nome'=>'pagina_adicionar',
                'descricao'=>'Adicionar paginas'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_adicionar')->first();
            $permissao->update([
                'nome'=>'pagina_adicionar',
                'descricao'=>'Adicionar paginas'
            ]);
        }

        if(!Permissao::where('nome','=','pagina_editar')->count()){
            Permissao::create([
                'nome'=>'pagina_editar',
                'descricao'=>'Editar paginas'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_editar')->first();
            $permissao->update([
                'nome'=>'pagina_editar',
                'descricao'=>'Editar paginas'
            ]);
        }

        if(!Permissao::where('nome','=','pagina_deletar')->count()){
            Permissao::create([
                'nome'=>'pagina_deletar',
                'descricao'=>'Deletar paginas'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_deletar')->first();
            $permissao->update([
                'nome'=>'pagina_deletar',
                'descricao'=>'Deletar paginas'
            ]);
        }

        //imoveis
        if(!Permissao::where('nome','=','imovel_listar')->count()){
            Permissao::create([
                'nome'=>'imovel_listar',
                'descricao'=>'Listar imoveis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','imovel_listar')->first();
            $permissao->update([
                'nome'=>'imovel_listar',
                'descricao'=>'Listar imoveis'
            ]);
        }

        if(!Permissao::where('nome','=','imovel_adicionar')->count()){
            Permissao::create([
                'nome'=>'imovel_adicionar',
                'descricao'=>'Adicionar imoveis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','imovel_adicionar')->first();
            $permissao->update([
                'nome'=>'imovel_adicionar',
                'descricao'=>'Adicionar imoveis'
            ]);
        }

        if(!Permissao::where('nome','=','imovel_editar')->count()){
            Permissao::create([
                'nome'=>'imovel_editar',
                'descricao'=>'Editar imoveis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','imovel_editar')->first();
            $permissao->update([
                'nome'=>'imovel_editar',
                'descricao'=>'Editar imoveis'
            ]);
        }

        if(!Permissao::where('nome','=','imovel_deletar')->count()){
            Permissao::create([
                'nome'=>'imovel_deletar',
                'descricao'=>'Deletar imoveis'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','imovel_deletar')->first();
            $permissao->update([
                'nome'=>'imovel_deletar',
                'descricao'=>'Deletar imoveis'
            ]);
        }

        //slides
        if(!Permissao::where('nome','=','slide_listar')->count()){
            Permissao::create([
                'nome'=>'slide_listar',
                'descricao'=>'Listar slides'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','slide_listar')->first();
            $permissao->update([
                'nome'=>'slide_listar',
                'descricao'=>'Listar slides'
            ]);
        }

        if(!Permissao::where('nome','=','slide_adicionar')->count()){
            Permissao::create([
                'nome'=>'slide_adicionar',
                'descricao'=>'Adicionar slides'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','slide_adicionar')->first();
            $permissao->update([
                'nome'=>'slide_adicionar',
                'descricao'=>'Adicionar slides'
            ]);
        }

        if(!Permissao::where('nome','=','slide_editar')->count()){
            Permissao::create([
                'nome'=>'slide_editar',
                'descricao'=>'Editar slides'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','slide_editar')->first();
            $permissao->update([
                'nome'=>'slide_editar',
                'descricao'=>'Editar slides'
            ]);
        }

        if(!Permissao::where('nome','=','slide_deletar')->count()){
            Permissao::create([
                'nome'=>'slide_deletar',
                'descricao'=>'Deletar slides'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','slide_deletar')->first();
            $permissao->update([
                'nome'=>'slide_deletar',
                'descricao'=>'Deletar slides'
            ]);
        }

        //categoria
        if(!Permissao::where('nome','=','categoria_listar')->count()){
            Permissao::create([
                'nome'=>'categoria_listar',
                'descricao'=>'Listar Categoria'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','categoria_listar')->first();
            $permissao->update([
                'nome'=>'categoria_listar',
                'descricao'=>'Listar Categoria'
            ]);
        }

        if(!Permissao::where('nome','=','categoria_adicionar')->count()){
            Permissao::create([
                'nome'=>'categoria_adicionar',
                'descricao'=>'Adicionar Categoria'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','categoria_adicionar')->first();
            $permissao->update([
                'nome'=>'categoria_adicionar',
                'descricao'=>'Adicionar Categoria'
            ]);
        }

        if(!Permissao::where('nome','=','categoria_editar')->count()){
            Permissao::create([
                'nome'=>'categoria_editar',
                'descricao'=>'Editar Categoria'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','categoria_editar')->first();
            $permissao->update([
                'nome'=>'categoria_editar',
                'descricao'=>'Editar Categoria'
            ]);
        }

        if(!Permissao::where('nome','=','categoria_deletar')->count()){
            Permissao::create([
                'nome'=>'categoria_deletar',
                'descricao'=>'Deletar Categoria'
            ]);
        }else{
            $permissao = Permissao::where('nome','=','categoria_deletar')->first();
            $permissao->update([
                'nome'=>'categoria_deletar',
                'descricao'=>'Deletar Categoria'
            ]);
        }
    }
}
