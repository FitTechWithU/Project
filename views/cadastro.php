<?php
    require_once "../models/conexao.php";

    session_start();

    //echo "testando";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['name'];
        $data_nasc = $_POST['date'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_confirmacao = $_POST['senha_confirmacao'];

        try {
            
            $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            $dataAtual = new DateTime();
            $dataNascimento = new DateTime($data_nasc);
            $idade = $dataAtual->diff($dataNascimento)->y;
            
            if ($idade < 16) {
                $_SESSION["erro_idade"] = "Você precisa ter pelo menos 16 anos para se cadastrar.";
                header("Location: cadastro.php");
                exit();
            }
            
            if ($stmt->rowCount() > 0) {
                $_SESSION["erro_email"] = "Esse e-mail já foi cadastrado!";
                header("Location: cadastro.php");
                exit();
            }

            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, data_nasc, email, senha)
            VALUES (:nome, :data_nasc, :email, :senha)";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':data_nasc', $data_nasc);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_hash);

            $stmt->execute();
            session_destroy();
            header("Location: login.html");
            exit;

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
        <link rel="stylesheet" href="../CSS/styleLoginCadastro.css">
        <title>Cadastro FitTech</title>
    </head>
    <body>

        <div class="form-container">
            <h1>Cadastro FitTech</h1>

            <form action="cadastro.php" method="POST" id="formulario">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" required>

                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" id="date" name="date" required>
                <?php 
                    if(isset($_SESSION["erro_idade"])) {
                        echo "<div class='error'>".$_SESSION["erro_idade"]."</div>";
                        unset($_SESSION["erro_idade"]);
                    }
                ?>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
                <?php 
                    if(isset($_SESSION["erro_email"])) {
                        echo "<div class='error'>".$_SESSION["erro_email"]."</div>";
                        unset($_SESSION["erro_email"]);
                    }
                ?>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <label for="senha_confirmacao">Confirme sua senha</label>
                <input type="password" id="senha_confirmacao" name="senha_confirmacao" required>
                <div class="hidden error" id="erro_senha_confirmacao">
                    <p>*As senhas não coincidem</p>
                </div>

                <br><br>

                <p>Já possui uma conta? Faça <a href="login.html">login</a>!</p>

                <button type="button" onclick="validacaoCampos()">Cadastrar</button>
            
            </form>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>
