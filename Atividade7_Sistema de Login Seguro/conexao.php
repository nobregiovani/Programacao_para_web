<?php
    //conexao.php
    $host = 'localhost';
    $db = 'db_meu_blog'; // nome do banco de dados no mysql
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=>false
    ];

    try {
        //Esta é a variável que usaremos em todos os outros arquivos
        $pdo = new PDO($dsn, $user, $pass, $options); 
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(),(int)$e->getCode());
    }
?>