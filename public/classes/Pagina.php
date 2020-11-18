<?php

class Pagina
{
    public $main;
    public $template;
    public $contents;

    public function __construct(string $template, string $main, array $contents)
    {
        $this->main = 'pages/' . $main;
        $this->template = 'templates/' . $template;
        $contents['stylecss'] = '/css/style.css';
        $contents['sidebarjs'] = '/js/sidebar.js';
        $contents['fontawesome'] = 'https://kit.fontawesome.com/924c78097a.js';
        $contents['logo'] = 'images/logo.png';
        $this->contents = $contents;
    }

    public function mostrarPagina()
    {
        $pagina = str_replace('#HEAD#', file_get_contents("templates/head"), file_get_contents($this->template));
        $pagina = str_replace('#FOOTER#', file_get_contents("templates/footer"), $pagina);
        $pagina = str_replace('#CONTENT#', file_get_contents($this->main), $pagina);
        foreach ($this->contents as $key => $value)
        {
            $pagina = str_replace("#$key#", $value, $pagina);
        }
        echo $pagina;
    }
}
