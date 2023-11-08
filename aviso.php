<?php 
session_start();
    $email = $_SESSION["mail"];
    $senha = $_SESSION["passw"];
    $visitas = $_SESSION["visits"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/aviso.css">
    <link rel="icon" type="image/png" href="img/alert.png">
    <title>Aviso</title>
</head>
<body>
    
        <div id="title">
            <header>
                <h1>AVISO</h1>
            </header>
        </div>
        <div class="tBox">
            <p>A Prefeitura de Florianópolis, indica fortemente que seus Funcionários não cliquem em links suspeitos. Sempre 
                desconfiem de mensagens estranhas e sigam as regras de segurança.</p>
            <p>Fique esperto, se atualize, e espalhe informação. Juntos, vamos manter a Prefeitura e seus dados seguros!</p>
        </div>

        <div class="bBox">
            <div class="img">
                <img src="img/alertajpgBG.png" class="alerta">
            </div>

            <div class="boxDados">
                <div>
                    <p>Usuário:*************************</p>
                    <p>IP:******************************</p>
                    <p>Browser:******************************</p>
                    <p>Dominio:**************************</p>
                    <p>Histórico:**************************</p>
                    <p>Email: <?php echo $email;?></p>
                    <p>Senha: <?php echo $senha;?></p>
                </div>
            </div>     

            <div class="img"> 
                <img src="img/alertajpgBG.png" class="alerta">
            </div>
        </div>    
</body>
</html>

