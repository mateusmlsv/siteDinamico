<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo','=','sobre')->count();

        if($existe){
        	$paginaSobre = Pagina::where('tipo','=','sobre')->first();
        }else{
        	$paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Título da Empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa";
        $paginaSobre->imagem = "img/card-casa.jpg";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10437.972140473325!2d-49.03037747574373!3d-22.339259474049342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bf5d92cde34afd%3A0x33652a01704c54f2!2sHospital+Estadual+de+Bauru!5e0!3m2!1spt-BR!2sbr!4v1563472116234!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();

        /********contato**********/
        $existe = Pagina::where('tipo','=','contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo','=','contato')->first();
        }else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo = "Entre em contato";
        $paginaContato->descricao = "Preencha o formulário.";
        $paginaContato->texto = "Contato";
        $paginaContato->imagem = "img/card-casa.jpg";
        $paginaContato->email = "mateusleandrinho@gmail.com";
        
        $paginaContato->tipo = "contato";
        $paginaContato->save();

    }
}
