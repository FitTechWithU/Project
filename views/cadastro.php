<?php
    require_once "../models/conexao.php";

    //echo "testando";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['name'];
        $data_nasc = $_POST['date'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_confirmacao = $_POST['senha_confirmacao'];

        try {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, data_nasc, email, senha)
            VALUES (:nome, :data_nasc, :email, :senha)";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':data_nasc', $data_nasc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_hash);

            $stmt->execute();

            header("Location: login.html");
            exit;

        } catch (PDOException $e) {
            echo "Erro ao cadastrar cliente: " . $e->getMessage();
        }
    }

?>
