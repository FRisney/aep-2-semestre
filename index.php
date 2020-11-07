<?php

require "source/classes/Pagina.php";

$pagina = null;
$template = '';
$view = substr($_SERVER['REQUEST_URI'], 1);
$contents = [];

switch ($view)
{
case 'acao-social':
    $template = 'artigo';
    $contents['titulo'] = 'Problema Social em Curitiba';
    $contents['header-img'] = 'resource/morador-rua-1.jpeg';
    $contents['header-alt'] = '';
    break;
case 'economia-agua':
    $template = 'artigo';
    $contents['titulo'] = 'Dicas para economia de água em Curitiba';
    $contents['header-img'] = 'resource/torneira.jpeg';
    $contents['header-alt'] = '';
    break;
case 'falta-agua':
    $template = 'artigo';
    $contents['titulo'] = 'Falta de água';
    $contents['header-img'] = 'resource/seca-1.jpeg';
    $contents['header-alt'] = '';
    break;
case 'importancia-agua':
    $template = 'artigo';
    $contents['titulo'] = 'A importância da água';
    $contents['header-img'] = 'resource/eco-3.jpeg';
    $contents['header-alt'] = '';
    break;
case 'industria-agricola':
    $template = 'artigo';
    $contents['titulo'] = 'Uso industrial e agrícola da água';
    $contents['header-img'] = 'resource/agricultura-1.jpeg';
    $contents['header-alt'] = '';
    break;
case 'meio-ambiente':
    $template = 'artigo';
    $contents['titulo'] = 'O Meio Ambiente';
    $contents['header-img'] = 'resource/eco-2.jpeg';
    $contents['header-alt'] = '';
    break;
case 'sobre':
    $template = 'artigo';
    $contents['titulo'] = 'Sobre a empresa';
    $contents['header-img'] = 'resource/sanepar-predio.jpeg';
    $contents['header-alt'] = '';
    break;
default:
    $template = 'home';
    $view = 'home';
    $contents['titulo'] = 'Home';
    $contents['hero-img'] = 'resource/rio-seco.jpeg';
    $contents['hero-alt'] = 'hero image';
}

$pagina = new Pagina($template, $view, $contents);

$pagina->mostrarPagina();
