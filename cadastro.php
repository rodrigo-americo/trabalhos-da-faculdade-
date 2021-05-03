<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css_login/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css_login/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Bem vindo</h3>
                    <h3 class="title has-text-grey">Crie Seu Cadastro</h3>
                    
                    
                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" name="text" class="input is-large" placeholder="Seu Nome" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="email" class="input is-large" type="password" placeholder="Seu e-mail">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="endereco" name="text" class="input is-large" placeholder="Seu endereço" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Sua senha (mínimo 6 digitos)">
                                </div>
                            </div>
                            
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Criar conta</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>