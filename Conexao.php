<?php
class Conexao
{
    protected static $conexao;

    private function __construct()
    {

        $db_host = "localhost";
        $db_driver = "mysql";
        $db_nome = "db_lab_dash";
        $db_usuario = "root";
        $db_senha = "";

        try {
            self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('SET NAMES utf8');

        } catch (PDOException $e) {
            echo "Erro na conexão com Banco de Dados: " . $e->getMessage();
            
        }
    }

    public static function getConnect()
    {
        if (!self::$conexao) {
            new Conexao();
        }
        return self::$conexao;
    }
}
