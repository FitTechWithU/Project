<?php 

    require_once "../models/conexao.php";
    session_start(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT id_usuario, nome, senha FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt-> execute();

            if($stmt->rowCount() > 0) {

                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($senha, $usuario['senha'])) {

                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['nome'] = $usuario['nome'];

                    header("Location: index.php");
                    exit();
                }  else {

                    $_SESSION["erro_login"] = "Senha incorreta.";

                }

            } else {
                $_SESSION["erro_login"] = "E-mail não cadastrado.";
            }
        } catch (PDOException $e) {
            echo "Erro ao tentar fazer login: " . $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleLoginCadastro.css">
    <title>Login FitTech</title>
</head>
<body>

    <div class="form-container">
        <h1>Login FitTech</h1>

        <form action="#" method="POST">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            <?php 
                if(isset($_SESSION["erro_login"])) {
                    echo "<div class='error'>".$_SESSION["erro_login"]."</div>";
                    unset($_SESSION["erro_login"]);
                }
            ?>

            <div class="checkbox-container">
                <input type="checkbox" id="conectado" name="conectado">
                <label for="conectado">Mantenha-se conectado</label>
            </div>

            <br><br>

            <p>Não possui uma conta? Faça <a href="cadastro.php">cadastro</a>!</p>

            <a href="index.html"><button type="submit">Entrar</button></a>


        </form>
    </div>

</body>
</html>
