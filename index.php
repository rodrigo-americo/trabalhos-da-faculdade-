
<html lang = "pt">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charest="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/slick.css" />
    <title>Primeiro Projeto</title>
</head>

<body>
    <header class="menu-principal">
        <main>
            <div class="header-1">
                <div class="logo">
                    <img src="./img/Coin_logo2.png" />
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
                include'moedas/lejson.php';
                $produtos=lejason('moedas/Produtos.json');
                foreach($produtos as $produto){
                    echo "<div class='col-3 bloco-texto bloco-imagem '>
                    <img src='".$produto->foto."'>
                    <p><b>".$produto->nome_do_produto."</b></p>
                    <p>".$produto->descricao."
                    <b>".$produto->valor.".</b>
                    </p>
                    </div>";
                }
            ?>
            
        </div>
    </div>
    <form action = 'http://localhost/facu_php/php_p1/moedas/form_moedas.php'>
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