<?php
// DATABASE_URL=postgres://postgres:passwd@localhost:5432/postgres
class DB extends Pagina
{
    private $conn;
    private $pdo;

    public function __construct()
    {
        $this->template = 'templates/artigo';
        $this->main = 'pages/consultar-consumo';
        $this->contents['stylecss'] = '/css/style.css';
        $this->contents['sidebarjs'] = '/js/sidebar.js';
        $this->contents['fontawesome'] = 'https://kit.fontawesome.com/924c78097a.js';
        $this->contents['logo'] = 'images/logo.png';
        $this->contents['titulo'] = 'Consulta';
        $this->conn = parse_url(getenv("DATABASE_URL"));
        $this->pdo = new PDO("pgsql:" . sprintf(
            "host=%s;port=%s;user=%s;password=%s;dbname=%s",
            $this->conn["host"],
            $this->conn["port"],
            $this->conn["user"],
            $this->conn["pass"],
            ltrim($this->conn["path"], "/")
        ));
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getConsumo($regiao)
    {
        $q = $this->pdo->prepare('select to_char(data, \'DD/MM/YYYY\') as "data", min, max, avg from consumo where fk_regiao_id = ? order by data desc;');
        $q->execute(array($regiao));
        $r = $q->fetchAll();
        $this->contents['consumo'] = $r;
        $this->contents['cons-sem'] = '[';
        $this->contents['cons-dia'] = '[';
        for ($i=7; $i >= 0; $i--) {
            $this->contents['cons-sem'] .= $r[$i]['avg'].',';
            $this->contents['cons-dia'] .= '"'.$r[$i]['data'].'",';
        }
        $this->contents['cons-dia'] .= ']';
        $this->contents['cons-sem'] .= ']';
    }

    public function mostrarPagina()
    {
        $pagina = str_replace('#HEAD#', file_get_contents("templates/head"), file_get_contents($this->template));
        $pagina = str_replace('#FOOTER#', file_get_contents("templates/footer"), $pagina);
        $pagina = str_replace('#CONTENT#', file_get_contents($this->main), $pagina);
        $consumo = '';
        foreach ($this->contents as $key => $value)
        {
            $tempConsumo = file_get_contents('templates/consumo-linha');
            if ($key == 'consumo') {
                if (count($value) == 0) {
                    $consumo = '<tr> <td colspan="4">Não há registros</td> </tr>';
                } else{
                    foreach ($value as $linha){
                        $dados = str_replace('#data#',$linha['data'], $tempConsumo);
                        $dados = str_replace('#min#', $linha['min'], $dados);
                        $dados = str_replace('#avg#', $linha['avg'], $dados);
                        $consumo .= str_replace('#max#', $linha['max'], $dados);
                    }
                }
            }else
                $pagina = str_replace("#$key#", $value, $pagina);
        }
        $pagina = str_replace("#consumo#", $consumo, $pagina);
        echo $pagina;
    }
}
