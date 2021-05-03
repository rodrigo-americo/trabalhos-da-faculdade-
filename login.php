<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css_login/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css_login/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login</h3>
                    
                    
                    <div class="box">
                        <form action="processa.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input type='email' name="email" class="input is-large" placeholder="Seu e-mail" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input type='password' name="senha" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>
                            <input type="submit" class="button is-block is-link is-large is-fullwidth"></button>
                            <div>
                                <h3>
                                <a href="http://localhost/projeto_p1_php/php_p1/cadastro.php" target="_blank">Criar conta</a>                                
                                </h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>