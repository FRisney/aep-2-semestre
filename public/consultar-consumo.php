<?php
// DATABASE_URL=postgres://postgres:passwd@localhost:5432/postgres
$db = parse_url(getenv("DATABASE_URL"));

$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));

echo "<pre>";
echo getenv("DATABASE_URL").PHP_EOL;
print_r($db);
echo "</pre>";

$query = $pdo->query("select * from fornecedor;");

echo "<pre>";
print_r($query);
echo "</pre>";

$result = $query->fetchAll();

echo "<pre>";
print_r($result);
echo "</pre>";

