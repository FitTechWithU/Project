<?php
        require_once "../models/conexao.php";

        session_start();

        if (!isset($_SESSION['idusuario'])) {
            header("Location: login.php");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTech</title>
    <link rel="stylesheet" href="../CSS/styleMainPage.css">
    <script src="https://kit.fontawesome.com/f4014b9e29.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f9a0acd7af.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="flex_row">
        <nav class="center">
            <a href="index.php#sobre_scroll">Sobre nós</a>
            <a href="index.php#instrutores_scroll">Instrutores</a>
            <a href="index.php#produtos_scroll">Produtos</a>
            <a href="index.php#projeto_scroll">Projeto</a>
            <a href="contato.html">Contato</a>
        </nav>
        <div>
            <a href="carrinho.php">
                <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #000;"></i>
            </a>
            <a href="perfil.php">
                <i class="fa-solid fa-user fa-2xl" style="color: var(--span_color);"></i>
            </a>
        </div>
    </header>
    <br><br>
    <div class="box">
        <h1 class="sua-conta">Conta de <span><?php echo htmlspecialchars($_SESSION['nome']); ?></span></h1>
        <br>
        <div class="three-row">
            <section class="info">
                <div class="table">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <div class="content">
                        <h4>Seus pedidos</h4>
                        <div>
                            <!-- icon -->
                            <p>Rastrear, devolver ou comprar produtos novamente</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="info">
                <div class="table">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="content">
                        <h4>Seus endereços</h4>
                        <!-- icon -->
                        <p>Alterar endereços para pedidos e presentes</p>
                    </div>
                </div>
            </section>
            <section class="info">
                <div class="table">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div class="content">
                        <h4>Seus pagamentos</h4>
                        <!-- icon -->
                        <p>Gerenciar ou adicionar formas de pagamento e ver suas transações</p>
                    </div>
                </div>
            </section>
        </div>

        <div class="three-row">
            <section class="info">
                <div class="table">
                    <i class="fa-solid fa-money-bill"></i>
                    <div class="content">
                        <h4>Reembolsos Boleto/Pix</h4>
                        <!-- icon -->
                        <p>Ver saldo ou resgatar reembolsos de Boleto e Pix</p>
                    </div>
                </div>
            </section>
            <section class="info">
                <div class="table">
                    <i class="fa-solid fa-list"></i>
                    <div class="content">
                        <h4>Sua lista de desejos</h4>
                        <!-- icon -->
                        <p>Gerenciar, compartilhar, ou criar listas de desejos</p>
                    </div>
                </div>
            </section>
        </div>
        <br><br>
        <div class="three-row">
            <section class="info">
                <div class="table-scndBox">
                    <h4>Configurações de compras e pedidos</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
            <section class="info">
                <div class="table-scndBox">
                    <h4>Gerencie seus dados</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
            <section class="info">
                <div class="table-scndBox">
                    <h4>Alertas de e-mail, mensagens e anúncios</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
        </div>
        <div class="three-row">
            <section class="info">
                <div class="table-scndBox">
                    <h4>Mais formas de pagamento</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
            <section class="info">
                <div class="table-scndBox">
                    <h4>Outras contas</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
            <section class="info">
                <div class="table-scndBox">
                    <h4>Assinaturas</h4>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                    <p>Preferências de comunicação</p>
                </div>
            </section>
        </div>
    </div>

    <!-- CARROSSEL PRODUTOS VISTOS -->
    <div class="box-carrossel">
        <h3>Vistos por último</h3>
    </div>

    <!-- CARROSSEL PRODUTOS SEMELHEANTES -->
    <div class="box-carrossel">
        <h3>Os clientes que viram os produtos em seu histórico de navegação também viram</h3>
    </div>

    <!-- CARROSSEL PRODUTOS HISTÓRICO -->
    <div class="box-carrossel">
        <h3>Histórico</h3>
    </div>

    <br><br>

    <div class="btn-center">
        <!-- <a href="alterarPerfil.php" class="btn-alterar">Alterar</a> &nbsp; &nbsp; -->
        <a href="logout.php" class="btn-apagar">Sair</a>
    </div>

    <br><br>

    <footer class="center">
        <p>&copy; 2024 FitTech. Todos os direitos reservados.</p>
    </footer>
</body>

</html>