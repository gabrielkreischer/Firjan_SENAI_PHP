<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        // Inclui o arquivo da classe Database
        require_once 'Database.php';
        // Cria uma instância da classe Database
        $database = new Database("localhost", "senai_aulaphp", "gabriel", "123456");
        // Chama o método connect para estabelecer a conexão
        $database->connect();
        // Obtém a instância PDO para realizar consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
    <?php
        if ($pdo) {
            try {
                $stmt = $pdo->prepare("SELECT id, nome FROM usuario");
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                if ($resultados) {
                    foreach ($resultados as $row) {
                        echo "ID: " . $row['id'] . "<br>";
                        echo "Nome: " . $row['nome'] . "<br>";
                    }
                } else {
                    echo "Nenhum registro encontrado.<br>";
                }
            } catch (PDOException $e) {
                echo "Erro ao consultar o banco de dados: " . $e->getMessage() . "<br>";
            }
        }
    ?>
</body>
</html>