<?php

require "classes/Pagina.php";

$pagina = null;
$template = '';
$view = substr($_SERVER['REQUEST_URI'], 1);
$img_path = '/images/';
$contents = [];

switch ($view)
{
case 'acao-social':
    $template = 'artigo';
    $contents['titulo'] = 'Problema Social em Curitiba';
    $contents['header-img'] = $img_path."morador-rua-1.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."morador-rua-2.jpeg";
    break;
case 'economia-agua':
    $template = 'artigo';
    $contents['titulo'] = 'Dicas para economia de água em Curitiba';
    $contents['header-img'] = $img_path."torneira.jpeg";
    $contents['header-alt'] = '';
    break;
case 'falta-agua':
    $template = 'artigo';
    $contents['titulo'] = 'Falta de água';
    $contents['header-img'] = $img_path."seca-1.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."seca-2.jpeg";
    break;
case 'importancia-agua':
    $template = 'artigo';
    $contents['titulo'] = 'A importância da água';
    $contents['header-img'] = $img_path."eco-3.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."ciclo-agua.jpeg";
    $contents['img2'] = $img_path."animais.jpeg";
    $contents['img3'] = $img_path."pessoa.jpeg";
    break;
case 'industria-agricola':
    $template = 'artigo';
    $contents['titulo'] = 'Uso industrial e agrícola da água';
    $contents['header-img'] = $img_path."agricultura-1.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."agricultura-2.jpeg";
    $contents['img2'] = $img_path."corte-jato-dagua.jpeg";
    break;
case 'meio-ambiente':
    $template = 'artigo';
    $contents['titulo'] = 'O Meio Ambiente';
    $contents['header-img'] = $img_path."eco-2.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."agua.jpeg";
    $contents['img2'] = $img_path."eco-1.jpeg";
    break;
case 'sobre':
    $template = 'artigo';
    $contents['titulo'] = 'Sobre a empresa';
    $contents['header-img'] = $img_path."sanepar-predio.jpeg";
    $contents['header-alt'] = '';
    $contents['img1'] = $img_path."sanepar-aerea.jpeg";
    break;
case 'consultar-consumo':
    header('Location: /consultar-consumo.php');
    break;
case 'home':
    $template = 'home';
    $view = 'home';
    $contents['titulo'] = 'Home';
    $contents['hero-img'] = $img_path."rio-seco.jpeg";
    $contents['hero-alt'] = 'hero image';
    break;
default:
    header('Location: /home');
}

$pagina = new Pagina($template, $view, $contents);

$pagina->mostrarPagina();
