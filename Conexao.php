<?php
class Conexao
{
    protected static $conexao;

    private function __construct()
    {

        $db_host = "192.168.0.214";
        $db_driver = "";
        $db_nome = "equipe010";
        $db_usuario = "equipe010";
        $db_senha = "Huawei@GP-SENAI-010";

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
?>
