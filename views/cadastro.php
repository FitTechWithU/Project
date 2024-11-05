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
            $sql = "INSERT INTO usuarios (nome, data_nasc, email, senha)
            VALUES (:nome, :data_nasc, :email, :senha)";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':data_nasc', $data_nasc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);

            $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao cadastrar cliente: " . $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro_login.css">
    <title>Cadastro FitTech</title>
</head>
<body>

    <div class="form-container">
        <h1>Cadastro FitTech</h1>

        <form action="" method="POST">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" required>

            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" id="date" name="date" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="senha">Confirme sua senha</label>
            <input type="password" id="senha_confirmacao" name="senha_confirmacao" required>
            <div class="hidden error">
                <p>*As senhas não coincidem</p>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="conectado" name="conectado">
                <label for="conectado">Mantenha-se conectado</label>
            </div>

            <br><br>

            <p>Já possui uma conta? Faça <a href="login.html">login</a>!</p>

            <button type="submit">Cadastrar</button>
           
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>