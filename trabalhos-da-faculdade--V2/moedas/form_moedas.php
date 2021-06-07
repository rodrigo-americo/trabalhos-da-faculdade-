<?php
session_start();

include ('./funcao_carrinho.php');
include ('./carrinho.php');
include ('./scripts-antigos(JSON)/lejson.php');
include ('./../pdf/gerar_pdf.php');


// checa se cliente está logado
if(!isset($_SESSION["logado"]) || !isset($_SESSION["cliente"])){
    $_SESSION["logado"] = FALSE;
    $_SESSION["cliente"] = NULL;
}
$logado = $_SESSION["logado"];
$cliente = $_SESSION["cliente"];

if($logado === FALSE){
    echo "<script> alert('Para comprar moedas você precisa fazer login antes senhor(a) .') </script>";
}

// chama a funcao de pegar a data atual
$data = geradata();
// n permite que seja gerado mais de 1 carrinho e estancia varios valores (mover para aquivo carinho)
if (!isset($_SESSION['carrinho'])) {
    cria_carinho();
}
// calcula desconto
if (isset($_POST['desconto'])) {
    $_SESSION['desconto'] = $_POST['desconto'] / 100;
}
// reseta o carrinho
if (isset($_POST['resetar'])) {
    resetar();
}
// base para adicionar 
if ( isset($_POST['produtos'])) {
    adicionar($_POST['produtos']);
    //var_dump($_SESSION["carrinho"]);
    //var_dump($_POST['produtos']);
    //var_dump(count($_SESSION["carrinho"]));
}

$_SESSION['valor_com_desconto'] = $_SESSION['valortotal'] - ($_SESSION['valortotal'] * $_SESSION['desconto']);

if (isset($_POST['enviar'])) {
    $compra_concluida = salvarBD();
    //criatxt($data);
    if($compra_concluida === TRUE){
        gerarPDF($_SESSION['carrinho']);
    }
    resetar();

}
?>
<HTML>

<HEAD>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <TITLE>Exemplo de Formulario - leitura dos dados</TITLE>
</HEAD>

<BODY>
    <div>
        <CENTER>
            <!-- Div abaixo engloba os 4 primeiros campos na página -->
            <div class="container">
                <FORM ACTION="form_moedas.php" METHOD="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 ">
                            <div class="mb-3">
                                <label for="Produtos" class="form-label">Produtos</label>
                                <?php
                                cria_lista_de_produtos();
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="mb-3">
                                <label for="cupom" class="form-label">Valor do cupom</label>
                                <select name='desconto' class="form-select" aria-label="Default select example" id="cupom">
                                    <option value="3" selected>3%</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mt-4  ">
                            <div class="d-grid gap-2">
                                <button type="submit"  class="btn btn-outline-success btn-block  " name='adicionar' value="ADICIONAR" <?php if($logado === FALSE) echo "disabled"; ?> >adicionar</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mt-4  ">
                            <div class="d-grid gap-2">
                            <label for="cupom" class="form-label">Cliente: <?php echo $cliente ?></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Form abaixo engloba o campo resetar -->
            <FORM ACTION="form_moedas.php" METHOD="post">
                <div class="col-sm-12 col-md-6 mt-4  ">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-danger btn-block " name='resetar' value="RESET" <?php if($logado === FALSE) echo "disabled"; ?> >Resetar</button>
                    </div>
                </div>
            </FORM>
            <!-- Form abaixo engloba o campo enviar e os checkbox -->
            <FORM ACTION="form_moedas.php" METHOD="post">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label for="entrega" class="form-label"> Tempo de entrega ? </label>
                        <div class="form-check">
                            <input name="entrega-24h" class="form-check-input" type="checkbox" value="24h" id="entrega">
                            <label class="form-check-label" for="entrega">
                                24h
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="entrega-correios" class="form-check-input" type="checkbox" value="correios" id="entrega">
                            <label class="form-check-label" for="entrega">
                                correios
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mt-4  ">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-success btn-block " name='enviar' value="ENVIAR" <?php if($logado === FALSE) echo "disabled"; ?> >Enviar</button>
                        </div>
                    </div>
                </div>
                <P>VALOR:<?php echo $_SESSION['valortotal']; ?> </P>
                <P>VALOR COM DESCONTO:<?php echo $_SESSION['valor_com_desconto']; ?> </P>
            </FORM>
        </CENTER>
        <a href="./../index.php">Voltar</a>
    </div>

</BODY>

</HTML>