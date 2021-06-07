<?php
session_start();

include("./php/conexao-bd/conexao.php");

//desloga funcionario
$_SESSION['funcionario-logado'] = FALSE;

// checa se cliente está logado
if(!isset($_SESSION["logado"]) || !isset($_SESSION["cliente"])){
    $_SESSION["logado"] = FALSE;
    $_SESSION["cliente"] = NULL;
}
$logado = $_SESSION["logado"];
$cliente = $_SESSION["cliente"];

?>
<html lang = "pt">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charest="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <title>Projeto da P2</title>
</head>

<body>
    <header class="menu-principal">
        <main>
            <div class="header-1">
                <div class="logo">
                    <img src="./img/coin_logo2.png" />
                </div>
                <div class="redes-sociais">
                    <ul>
                        <li>
                            <a href="">
                                <img src="./img/rss.png" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./img/face.png" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./img/tw.png" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./img/linkedin.png" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </header>
    <main class="col-100 menu-urls">
        <div class="header-2">
            <div class="menu">
                <ul>
                    <li>
                        <a href="">Produtos</a>
                    </li>
                    <li>
                        <a href="">Sobre nós</a>
                    </li>
                    <li>
                        <a href="">Contato</a>
                    </li>
                    <?php
                        if($logado){
                            echo '
                            <li>
                            CLIENTE: '.$cliente.'
                            </li>
                            <li>
                                <a href="./php/cadastro-e-login/deslogin.php">Deslogar</a>
                            </li>
                            ';
                        }
                        else{
                            echo '
                            <li>
                            <a href="./php/cadastro-e-login/cadastro.php">Cadastre-se</a>
                            </li>
                            <li>
                                <a href="./php/cadastro-e-login/login.php">Login</a>
                            </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
            <div class="busca">
                <input placeholder="Pesquise" type="text" />
            </div>
        </div>
    </main>
    <div class="col-100">
        <div class="slider-principal">
            <img src="./img/banner11.png" />
            <img src="./img/banner6.png" />
            <img src="./img/banner5.jpeg" />
            <img src="./img/banner7.jpg" />
        </div>
    </div>
    <div class="col-100">
        <div class="content texto-destaque">
            <h1>A loja do <strong>Seu Quincas</strong> existe desde 1823.</h1>
            <p>Foi passada de geração em geração assim se tornou um oficio de família estudar
                e ir atrás de itens únicos para nossos clientes, além de principalmente trabalhamos com moedas
                colecionáveis, também
                trabalhamos com obras de artes e relíquias antigas (espadas gregas ,persas japoneses).
                Devido a pandemia do Corona vírus, nos criamos este site pra continuar fornecendo
                bens da maior qualidade para nossos clientes.
                A família strober agradece sua confiança.</p>

            <div class="col-3 bloco-texto">
                <img src="./img/content-1.png" />
                <h3><b>Relíqueas antigas</b> do tempo dos egipcios e chineses </h3>
                <p>Artefátos difíceis de serem encontrados, com alto valor e de épocas históricas importantes feito
                    dinastia Ming na China e o reinada de Hamses II no Egito.
                </p>
            </div>
            <div class="col-3 bloco-texto" style="margin-top: 6em;">
                <img src="./img/content-2.png" />
                <h3><b>Moedas raras</b> com garantia e qualidade</h3>
                <p>Os itens em catálogo não apenas oferecem o selo de garantia e originalidade Sr.Quincas, como também
                    estão registradas no
                    banco de dados do museu nacional para demonstrar a veracidade do produto.
                </p>
            </div>
            <div class="col-3 bloco-texto">
                <img src="./img/content-3.png" />
                <h3><b>Obras de artes</b> confeccionada por renomados pintores</h3>
                <p>Quadros e tapecarias inestimáveis, criadas por incríveis pintores de artesões. A Coin Masters
                    concentrou
                    em obter os mais diversos produtos para satisfazer o seu cliente.
                </p>
            </div>
        </div>
    </div>
    <div class="col-100 bloco-imagens-texto">
        <div class="content">
            <?php
            /* Versão antiga em JSON
                include'moedas/scripts-antigos(JSON)/lejson.php';
                $produtos=lejason('moedas/scripts-antigos(JSON)/Produtos.json');
                foreach($produtos as $produto){
                    echo "<div class='col-3 bloco-texto bloco-imagem '>
                    <img src='".$produto->foto."'>
                    <p><b>".$produto->nome_do_produto."</b></p>
                    <p>".$produto->descricao."
                    <b>".$produto->valor.".</b>
                    </p>
                    </div>";
                }*/
                $query = "SELECT Nome, Valor, Descricao, Foto FROM Produtos";

                $resultado_select = mysqli_query($conn, $query);

                while($produto = mysqli_fetch_array($resultado_select)){
                    echo "<div class='col-3 bloco-texto bloco-imagem '>
                    <img src='./img/".$produto['Foto']."'>
                    <p><b>".$produto['Nome']."</b></p>
                    <p>".$produto['Descricao']."
                    <b>".$produto['Valor'].".</b>
                    </p>
                    </div>";
                }

            ?>
            
        </div>
    </div>
    <form action = 'moedas/form_moedas.php'>
        <P><INPUT TYPE="submit" NAME="enviar" VALUE="PROSSEGUIR"  /></P>
    </form>
    <div class="col-100 bloco-logos">
        <div class="content">
            <div class="col-4">
                <img alt="logo" title="logo" src="img/logo1.png" />
            </div>
            <div class="col-4">
                <img alt="logo" title="logo" src="img/logo2.png" />
            </div>
            <div class="col-4">
                <br />
                <img alt="logo" title="logo" src="img/logo3.png" />
            </div>
            <div class="col-4">
                <img alt="Puma" title="Puma" src="img/logo4.png" />
            </div>
        </div>
    </div>
    <footer>
        <div class="col-100 footer">
            <div class="content">
                <div class="col-4">
                    <h3><b>Exposições futuras</b></h3>
                    <p>Jundiaí shopping - Av. 9 de Julho, 913 - jardim paulista - jundiaí - SP</p>
                    <p class="clock">16 de Setembro de 2021
                    <p>
                    <p>Shopping Dom Pedro - Av. Guilherme Campos, 500 - Jardim Santa Genebra, Campinas - SP</p>
                    <p class="clock">03 de Novembro de 2021
                    <p>
                </div>
                <div class="col-4">
                    <h3><b>Tags</b></h3>
                    <p>Busca nas nossas redes sociais marque com #CoinsRaridades.</p>
                    <p>Área de funcionários: <a href="./php/agenda/index.php">Administrar estoque</a></p>
                </div>
                <div class="col-4">
                    <h3><b>Sobre nós</b></h3>
                    <p>
                        Somos uma empresa criada por colecionadores pensando nos colecionadores de moedas raras,
                        compreendendo a dificuldade de encontar obras inestimádas e únicas da história além de garantir
                        a legitimidade dos artefátos e qualidade.
                    </p>
                </div>
                <div class="col-4">
                    <h3><b>Contato</b></h3>
                    <p>
                        Estamos localizado proximo do nada, fazendo esquina com lugar nenhum. Rua das lamentações
                        número 1169 - andar -3 porta 2.
                    </p>
                    <p class="local">Jundiaí - SP
                    <p>
                    <p class="emailico">coins@raridade.com.br
                    <p>
                    <p class="telefoneico">(11) 99090-6969
                    <p>
                </div>
            </div>
        </div>
    </footer>
    <div class="col-100 footer-2">
        <div class="content">

            <p>
                Todos nós precisamos saber como o mundo funciona, os dois lados da moeda.
                Muita gente gosta de ver a Cara, mas é na Coroa que têm o valor!!
            </p>
        </div>
    </div>
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery-migrate.js"></script>
    <script type="text/javascript" src="./js/slick.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
</body>

</html>