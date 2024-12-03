<?php 

    require_once "../models/conexao.php";

    session_start();

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
                <a href="#sobre_scroll">Sobre nós</a>
                <a href="#instrutores_scroll">Instrutores</a>
                <a href="#produtos_scroll">Produtos</a>
                <a href="#projeto_scroll">Projeto</a>
                <a href="contato.php">Contato</a>
            </nav>
            <?php
                if(!isset($_SESSION["idusuario"])){
                    echo '<div>';
                        echo '<a href="login.php">Login</a> &nbsp; &nbsp;';
                        echo '<a href="cadastro.php">Cadastro</a>';
                    echo '</div>';
                }
            ?>
            <?php
                if(isset($_SESSION["idusuario"])){
                    echo '<div>';
                    echo '<a href="carrinho.php">';
                        echo '<i class="fa-solid fa-cart-shopping fa-2xl" style="color: #000;"></i>';
                    echo '</a>';
                    echo '<a href="perfil.php">';
                        echo '<i class="fa-solid fa-user fa-2xl"></i>';
                    echo '</a>';
                    echo '</div>';
                    }
                ?>
           
        </header>

        <section class="first_container center">
            <div class="square">
                <h1 id="sobre_scroll">Bem-vindo(a) à FitTech</h1>
            </div>
        </section>


        <main class="center flex_column">
            <div class="center down">
                <i class="fa-solid fa-dumbbell"></i>
            </div>

            <h2>Sobre a <span>FitTech</span></h2>
            <div class="about_fitTech center">
                <button>
                    <a href="">Encontrar academia</a>
                    <i class="fa-solid fa-magnifying-glass fa-flip-horizontal" style="color: #000000;"></i>
                </button>
            </div>
            <br>
            <p>
                A <span>FitTech</span> é uma academia moderna, focada no bem-estar e na saúde dos seus alunos. <br>
                Nosso objetivo é proporcionar uma experiência completa de cuidado físico e mental, <br>
                com programas variados que atendem diferentes níveis de condicionamento e objetivos pessoais.
            </p>
            <br><br>
            <div class="image-container">
                <div class="left-image">
                    <img src="../img/image1.jpg" alt="Imagem vertical">
                </div>
                <div class="right-images">
                    <img src="../img/image2.jpg" alt="Imagem horizontal 1" class="image_right1">
                    <img src="../img/image3.jpg" alt="Imagem horizontal 2" class="image_right2">
                </div>
            </div>

            <div class="center up" id="instrutores_scroll">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
        </main>

        <section class="second_container center flex_column">

            <h2>Conheça nossos <span>Instrutores</span></h2>
            <div class="flex_row Instructors">
                <div class="card center flex_column">
                    <img src="../img/pessoas/prof1.webp" alt="Professor1">
                    <p><strong>Rafael Costa</strong></p>
                    <p>Personal Trainer</p>
                </div>
                <div class="card center flex_column">
                    <img src="../img/pessoas/prof2.webp" alt="Professora2">
                    <p><strong>Ana Clara Martins</strong></p>
                    <p>Instrutora de Yoga</p>
                </div>
                <div class="card center flex_column">
                    <img src="../img/pessoas/prof3.webp" alt="Professor3">
                    <p><strong>Lucas Almeida</strong></p>
                    <p>Preparador Físico</p>
                </div>
            </div>
        </section>

        <section class="third_container center flex_column">
            <div class="center down">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
            <h2 id="produtos_scroll">Temos <span>Produtos para você!</span></h2>
            <div class="products flex_row">
                <div class="box center flex_column">
                    <img src="../img/produtos/produto1.jpg" alt="Produto1">
                    <br>
                    <p class="titulo_produto">Whey Protein</p>
                    <p>R$58,00</p>
                    <button>Adicionar ao carrinho</button>
                </div>
                <div class="box center flex_column">
                    <img src="../img/produtos/produto2.jpg" alt="Produto2">
                    <br>
                    <p class="titulo_produto">Creatina Monohidratada</p>
                    <p>R$58,00</p>
                    <button>Adicionar ao carrinho</button>
                </div>
                <div class="box center flex_column">
                    <img src="../img/produtos/produto3.jpg" alt="Produto3">
                    <br>
                    <p class="titulo_produto">BCAA</p>
                    <p>R$58,00</p>
                    <button>Adicionar ao carrinho</button>
                </div>
                <div class="box center flex_column">
                    <img src="../img/produtos/produto3.jpg" alt="Produto3">
                    <br>
                    <p class="titulo_produto">BCAA</p>
                    <p>R$58,00</p>
                    <button onclick="addCarrinho()">Adicionar ao carrinho</button>
                </div>
            </div>
            <button>
                <a href="produtos.html">
                    Ver mais
                    <i class="fa-solid fa-plus" style="color: #000000;"></i>
                </a>
            </button>
            <div class="center up">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
        </section>

        <section class="fourth_container center flex_column">
            <h2 >Sobre o que a <span>FitTech</span> se trata?</h2>
            <p class="sobre-fit">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil facere ipsum quod aspernatur ex et praesentium
                assumenda nostrum nobis deleniti incidunt perspiciatis sed, doloremque quibusdam, quam ut eveniet tempora
                id. <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias iste deserunt vitae ab officia assumenda
                tempore suscipit dolorum. Illum, doloremque? Rem labore quas dolorum, ex exercitationem beatae obcaecati
                reiciendis aut?
            </p>

            <br><br>

            <button id="contato_equipe"> 
                <a href="#contato_equipe">
                    Conheça a equipe
                    <i class="fa-solid fa-down-long"></i>
                </a>
            </button>

            <br><br>

        </section>

        <section class="fifth_container center flex_column">
            <h2>Conheça nossa <span>equipe</span>!</h2>

            <div class="flex_row Instructors">
                <div class="card center flex_column">
                    <img src="../img/equipe/alexia.jpeg" alt="Aléxia">
                    <p><strong>Aléxia Cazale</strong></p>
                    <div class="redes_sociais">
                        <a href="https://www.instagram.com/alexiarc/" target="_blank"><i class="fa-brands fa-instagram" style="color: black;" style="color: black;"></i></a>
                        <a href="https://github.com/AlexiaCazale" target="_blank"><i class="fa-brands fa-github" style="color: black;" style="color: black;"></i></a>
                        <a href="https://wa.me/qr/K4YB4GPS26LXG1" target="_blank"><i class="fa-brands fa-whatsapp" style="color: black;" style="color: black;"></i></a>
                    </div>
                </div>
                <div class="card center flex_column">
                    <img src="../img/equipe/geovana.jpeg" alt="Geovana">
                    <p><strong>Geovana Valentim</strong></p>
                    <div class="redes_sociais">
                        <a href="https://www.instagram.com/genova.png/" target="_blank"><i class="fa-brands fa-instagram" style="color: black;"></i></a>
                        <a href="https://github.com/gyoora" target="_blank"><i class="fa-brands fa-github" style="color: black;"></i></a>
                        <a href="https://wa.me/qr/LWVRYXUW6LRFE1" target="_blank"><i class="fa-brands fa-whatsapp" style="color: black;"></i></a>
                    </div>
                </div>
                <div class="card center flex_column">
                    <img src="../img/equipe/tiago.jpeg" alt="Tiago">
                    <p><strong>Tiago Casale</strong></p>
                    <div class="redes_sociais" id="projeto_scroll">
                        <a href="https://www.instagram.com/tiagocasale.tcb/" target="_blank"><i class="fa-brands fa-instagram" style="color: black;"></i></a>
                        <a href="https://github.com/ZFrosk" target="_blank"><i class="fa-brands fa-github" style="color: black;"></i></a>
                        <a href="https://wa.me/qr/5JXOKA56PQJTP1" target="_blank"><i class="fa-brands fa-whatsapp" style="color: black;"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="sixth_container center flex_column">

            <div class="center up down">
                <i class="fa-solid fa-dumbbell"></i>
            </div>

            <br>

            <h2>Um pouco do <span>nosso protótipo</span>...</h2>

            <div class="flex_row prototipo">
                <div class="card center flex_column">
                    <img src="../img/prototipo/Home.png" alt="Página Home - protótipo">
                </div>
                <div class="card center flex_column">
                    <img src="../img/prototipo/Login.png" alt="Página Login - Protótipo">
                </div>

            </div>
            <div class="flex_row prototipo">
                <div class="card center flex_column">
                    <img src="../img/prototipo/Cadastro.png" alt="Página Cadastro - Protótipo">
                </div>
                <div class="card center flex_column">
                    <img src="../img/prototipo/Admin.png" alt="Página Admin - Protótipo">
                </div>
        </section>


        <section class="seventh_container center flex_column">
            <div class="center down">
                <i class="fa-solid fa-dumbbell"></i>
            </div>
            <br>
            <h2>Nosso <span>sistema</span> em funcionamento!</h2>

            <!-- <video src=""></video> -->

            <h1 class="center"><span>FIM</span></h1>
        </section>


        <br><br>

        <footer class="center">
            <p>&copy; 2024 FitTech. Todos os direitos reservados.</p>
        </footer>

    </body>

</html>