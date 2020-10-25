<?php

class Pagina
{
    public $main;
    public $template;
    public $contents;

    public function __construct(string $templatePath, string $mainPath)
    {
        $this->main = $mainPath;
        $this->template = $templatePath;
        $this->contents['stylecss'] = 'source/css/style.css';
        $this->contents['sidebarjs'] = 'source/js/sidebar.js';
        $this->contents['fontawesome'] = 'https://kit.fontawesome.com/924c78097a.js';
        $this->contents['logo'] = 'resource/logo.png';
    }

    public function set_contents(string $content, string $valor)
    {
        $this->contents[$content] = $valor;
    }

    public function mostrarPagina()
    {
        $head = file_get_contents("source/contents/head");
        $footer = file_get_contents("source/contents/footer");
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
