<?php

    require_once "../models/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/styleCarrinho.css">
    <script src="https://kit.fontawesome.com/f9a0acd7af.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Shopping Cart</title>
</head>

<body>
    <!-- Navbar -->
    <header class="flex_row">
        <nav class="center">
            <a href="index.php#sobre_scroll">Sobre nós</a>
            <a href="index.php#instrutores_scroll">Instrutores</a>
            <a href="index.php#produtos_scroll">Produtos</a>
            <a href="index.php#projeto_scroll">Projeto</a>
            <a href="contato.php">Contato</a>
        </nav>
        <div>
            <a href="carrinho.php">
                <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ee8803"></i>
            </a>
            <a href="perfil.php">
                <i class="fa-solid fa-user fa-2xl"></i>
            </a>
        </div>
    </header>

    <div class="container">
        <div class="cart">
            <h2>Shopping cart</h2>
            <p>Você tem 4 itens no seu carrinho!</p>

            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Produto</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody class="cart-item">
                    <tr class="cart-item">
                        <td><img src="img/produtos/produto1.jpg" alt="Produto 1"></td>
                        <td>Whey Protein</td>
                        <td>256GB, Navy Blue</td>
                        <td>
                            <input type="button" class="input_qnt" id="plus" value='-' onclick="process(-1)" />
                            <input id="quant" name="quant" class="quant" size="1" type="text" value="1" maxlength="5" />
                            <input type="button" class="input_qnt" id="minus" value='+' onclick="process(1)">
                        </td>
                        <td><span class="price">R$900</span></td>
                        <td><button class="delete" id="delete">🗑</button></td>
                    </tr>
                    <tr class="cart-item">
                        <td><img src="img/produtos/produto2.jpg" alt="Produto 2"></td>
                        <td>Creatina Monohidratada</td>
                        <td>256GB, Navy Blue</td>
                        <td>
                            <input type="button" class="input_qnt" id="plus" value='-' onclick="process(-1)" />
                            <input id="quant" name="quant" class="quant" size="1" type="text" value="1" maxlength="5" />
                            <input type="button" class="input_qnt" id="minus" value='+' onclick="process(1)">
                        </td>
                        <td><span class="price">R$900</span></td>
                        <td><button class="delete">🗑</button></td>
                    </tr>
                    <tr class="cart-item">
                        <td><img src="img/produtos/produto3.jpg" alt="Produto 3"></td>
                        <td>BCAA</td>
                        <td>256GB, Navy Blue</td>
                        <td>
                            <input type="button" class="input_qnt" id="plus" value='-' onclick="process(-1)" />
                            <input id="quant" name="quant" class="quant" size="1" type="text" value="1" maxlength="5" />
                            <input type="button" class="input_qnt" id="minus" value='+' onclick="process(1)">
                        </td>
                        <td><span class="price">R$900</span></td>
                        <td><button class="delete">🗑</button></td>
                    </tr>
                    <!-- <tr class="cart-item">
                        <td><img src="https://via.placeholder.com/100" alt="Produto 1"></td>
                        <td>Produto 1</td>
                        <td>256GB, Navy Blue</td>
                        <td>
                            <input type="button" class="input_qnt" id="plus" value='-' onclick="process(-1)" />
                            <input id="quant" name="quant" class="quant" size="1" type="text" value="1" maxlength="5" />
                            <input type="button" class="input_qnt" id="minus" value='+' onclick="process(1)">
                        </td>
                        <td><span class="price">R$900</span></td>
                        <td><button class="delete">🗑</button></td>
                    </tr> -->
                </tbody>
                <!-- Botão de voltar -->
                <a href="produtos.html" class="back-btn">← Continue comprando</a>
            </table>

        </div>

        <div class="checkout">
            <h2>Card details</h2>
            <form>
                <div class="card-types">
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-paypal"></i>
                    <i class="fa-brands fa-pix"></i>
                    <i class="fa-solid fa-barcode"></i>
                </div>

                <label for="nome">Nome completo</label>

                <input type="text">

                <label for="numero">Número</label>
                <input type="text">

                <label for="validade">Validade</label>
                <input type="text">

                <label for="cvv">CVV</label>
                <input type="number">
            </form>

            <br>

            <div class="summary">
                <p>Subtotal: <span>R$4798.00</span></p>
                <p>Desconto: <span>R$20.00</span></p>
                <p class="important">Total (Taxas inclusas): <span class="important">R$4818.00</span></p>
            </div>

            <br>

            <button class="checkout-btn" onclick="pagar()">Comprar</button>
        </div>
    </div>


    <footer class="center">
        <p>&copy; 2024 FitTech. Todos os direitos reservados.</p>
    </footer>

    <script>

        const deleteButton = document.querySelectorAll(".delete");

        deleteButton.forEach(button => {
            button.addEventListener("click", function () {
                Swal.fire({
                    title: "Tem certeza?",
                    text: "Você não poderá reverter está ação!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, delete!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deletado!",
                            text: "Seu produto foi deletado.",
                            icon: "success"
                        });
                    }
                });
            });
        });

        function deletar(){
            
        }

        function pagar() {
            Swal.fire({
                icon: "success",
                title: "Compra feita com sucesso!",
                text: "Volte sempre",
                showConfirmButton: true,
                //timer: 1500
            });
        }

        function process(quant) {
            var value = parseInt(document.querySelectorAll(".quant").value);
            value += quant;
            if (value < 1) {
                document.querySelectorAll(".quant").value = 1;
            } else {
                document.querySelectorAll(".quant").value = value;
            }
        }

    </script>

</body>

</html>