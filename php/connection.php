<?php
class Database {
    private $pdo;
    private $host;
    private $db;
    private $user;
    private $pass;

    // Construtor para definir as configurações do banco de dados
    public function __construct($host, $db, $user, $pass) {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    // Método para conectar ao banco de dados
    public function connect() {
        try {
            // Cria uma nova instância de PDO para MySQL
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);

            // Define o modo de erro do PDO para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexão com o banco de dados MySQL realizada com sucesso!<br>";
        } catch (PDOException $e) {
            // Exibe a mensagem de erro caso a conexão falhe
            echo "Erro na conexão com o banco de dados MySQL: " . $e->getMessage() . "<br>";
        }
    }

    // Método para retornar a instância PDO
    public function getConnection() {
        return $this->pdo;
    }
}
