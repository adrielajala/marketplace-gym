<?php

    # inicia a sessão
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Marketplace - Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-mkt.css?2<?= time() ?>">
    <link rel="icon" type="image/x-icon" href="../src/img/icon.svg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faustina&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    
</head>
<body>

    
    <nav>
        <div id="logo-container">
            <p> <b> Marketplace </b> </p>
        </div>
    </nav>

    <div id="buttons-container">
        <button id="testes">
            Bicicletas
        </button>
        <button>
            Esteiras
        </button>
        <button>
            Outros
        </button>

        <?php

            # alterar o botão de 'entrar' caso o usuário já esteja logado

            if (isset($_SESSION['logged']) && isset($_SESSION['sessionName'])) {
                $name = $_SESSION['sessionName'];
                echo "
                    
                    <button>
                        Bem-vindo, $name!
                    </button>

                    <button onclick='myAccount()'>
                        Acessar minha conta
                    </button>

                    <button onclick='logout()'>
                        Sair
                    </button>

                ";
            } else {
                echo "
                    
                    <button onclick='login()'>
                    <i class='fa-solid fa-arrow-right-to-bracket'> </i> Entrar
                    </button>

                ";
            }

        ?>

    </div>  

    <!-- adicionar depois na parte dos botões: elíptico, equipamentos, escadas -->
    <!-- https://api.whatsapp.com/send?phone={5519988433009} colocar esse link para redirecionar os clientes para o chat do vendedor -->
    <!-- https://tinypng.com/developers -->
    <!-- https://kraken.io/pricing -->
    <!-- criar wishlist e botão de favorito -->
    <!-- fazer o negocio de não mostrar o telefone quando o usuario nao estiver logado -->
    <!-- colocar api de cep -->
    <!-- confirmar cep para cada item -->
    <!-- garantia pré-venda e consultoria pré-compra. contratação de manutenção geral ||  -->
    <!-- ver um jeito de captar se o usuário clicou no 'está interessado' (link do whatsapp) -->
    <!-- https://www.sintegraws.com.br/api/documentacao-api-receita-federal-cpf.php api de cpf -->
    
    <div id="products-container">

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-img"> </div>
            <div class="card-info">
                <p class="text-title"> Nome do Produto </p>
                <p class="text-body"> Descrição </p>
            </div>
            <div class="card-footer">
                <span class="text-title"> R$ 99,99 </span>

                <div class="card-button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>

    </div>


    <!-- JavaScript -->
    <script src="../src/js/script-mkt.js?2<?= time(); ?>"></script>

</body>
</html>