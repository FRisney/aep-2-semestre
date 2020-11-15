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
        $head = file_get_contents("templates/head");
        $footer = file_get_contents("templates/footer");
        $pagina = file_get_contents($this->template);
        $content = file_get_contents($this->main);
        $pagina = str_replace('#HEAD#', $head, $pagina);
        $pagina = str_replace('#FOOTER#', $footer, $pagina);
        $pagina = str_replace('#CONTENT#', $content, $pagina);
        foreach ($this->contents as $key => $value)
        {
            $pagina = str_replace("#$key#", $value, $pagina);
        }
        echo $pagina;
    }
}
