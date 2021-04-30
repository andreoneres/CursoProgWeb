<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="André Oliveira Neres" />
    <meta name="description" content="Formulário para receber novas atualizações sobre Michael Jackson" \>
    <link rel="stylesheet" type="text/css" href="/assets/css/estilos.css" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <title>Formulário | Fã Club</title>
</head>

<body>

    <body>

        <body>
            <!-- CABEÇALHO -->
            <header>
                <nav class="menu">
                    <img id="imager" src="./assets/img/mm.png" alt="Logo com a letra 'M'" />
                    <!-- LOGO-->
                    <div class="logo"></div>
                    <!-- MENU -->
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="https://michaeljackson.com" target="_blank">Site Oficial</a></li>
                        <li><a href="form.php">Formulário</a></li>
                    </ul>
                </nav>
            </header>

            <!-- MAIN -->
            <main>
                <h3>Receba updates sobre Michael Jackson no seu e-mail!</h2>

                    <!-- FORMULÁRIO -->
                    <div id="formu">
                        <fieldset>
                            <form name="Club" method="POST" action="/assets/php/registro.php" enctype="multipart/form-data">

                                <label>Nome: <span style="color: red">*</span></label><br>
                                <input type="text" name="nome" placeholder="Nome" size="50" maxlength="30" required /><br><br>

                                <label>E-mail: <span style="color: red">*</span></label><br>
                                <input type="mail" name="email" placeholder="E-mail" size="50" maxlength="30" required /><br><br>

                                <label>Código Postal: <span style="color: red">*</span></label><br>
                                <input type="text" name="codpostal" placeholder="Código Postal" size="50" maxlength="8" required /><br><br>

                                <label>Idade: </label><br>
                                <input type="text" name="idade" placeholder="Idade" size="50" maxlength="2" /><br><br>

                                <label>Telefone: </label><br>
                                <input type="tel" name="telefone" placeholder="Telefone" size="50" maxlength="19" /><br><br>

                                <label>Foto:</label><br>
                                <input type="file" name="arquivo" size="50" maxlength="19"/><br>

                                <span style="color: red;">*</span><span style="color: #838282;font-weight: bold; font-size: 16px;">Campos
                                    obrigatórios</span><br><br>

                                <button type="submit" class="bt" value="Enviar" name="enviarform">Enviar</button>
                                <button type="reset" class="bt" value="Limpar">Limpar</button>
                                <a href="index.html"><input type="button" class="bt" value="Voltar" /></a>
                            </form>
                        </fieldset>
                    </div>
                    <div class="erros">
                        <?php 
                        foreach ($_SESSION as $erro) {
                            echo $erro;
                        }

                        if (!empty($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                        }
                        ?>
                    </div>
            </main>

            <!-- FOOTER -->
            <footer>
                <div class="container">
                    <span>© 2021 MJJ Music. Powered by Sony Music Entertainment. All Rights Reserved.</span>
                    <nav>
                        <ul class="redes-sociais">
                            <li>
                                <a href="https://www.instagram.com/michaeljackson/" target="_blank">
                                    <img src="assets/img/instagram.svg" alt="Instagram">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/michaeljackson/" target="_blank">
                                    <img src="assets/img/facebook.svg" alt="Facebook">
                                </a>
                            </li>

                            <li>
                                <a href="https://www.youtube.com/c/MichaelJackson?sub_confirmation=1/" target="_blank">
                                    <img src="assets/img/youtube.svg" alt="Youtube">
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </footer>
        </body>

</html>