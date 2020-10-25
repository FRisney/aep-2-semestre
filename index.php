<?php

require "source/classes/Pagina.php";

$pagina = array('tipo'=>'','caminho'=>'');
// echo '<pre>';
foreach (new DirectoryIterator('source/contents/') as $arquivo) {
    if($arquivo->isDot()) continue;
    // echo $arquivo->getBasename() . PHP_EOL;
    if (substr($_SERVER['REQUEST_URI'], 1) == $arquivo->getBasename())
    {
        // echo substr($_SERVER['REQUEST_URI'], 1);
        $pagina['caminho'] = 'source/contents/' . $arquivo->getBasename();
        $pagina['tipo'] = 'source/templates/artigo';
    } else if ($_SERVER['REQUEST_URI'] == '/')
    {
        $pagina['caminho'] = 'source/contents/home';
        $pagina['tipo'] = 'source/templates/home';
    }
}

$pagina = new Pagina($pagina['tipo'], $pagina['caminho']);
// https://kit.fontawesome.com/924c78097a.js
// echo $_SERVER['REQUEST_URI'];
// echo '</pre>';
$pagina->mostrarPagina();
