<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;

class ImovelController extends Controller
{
    public function index($id)
    {
    	$imovel = Imovel::find($id);
    	$galeria = $imovel->galeria()->orderBy('ordem')->get();
    	$direcaoImagem = ['center-align','left-align','right-align'];    	
    	return view('site.imovel',compact('imovel','direcaoImagem','galeria'));
    }
}
