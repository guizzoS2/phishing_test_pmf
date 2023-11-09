<?php 
session_start();
    $visitas = $_SESSION["visits"];
    $email = $_SESSION["mail"];
    $senha = $_SESSION["passw"];
    $ip = file_get_contents("https://ipinfo.io/ip");
    $clienteIP = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
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
            
                <h1>AVISO</h1>
           
        </div>
        <div class="tBox">
            <p>A Prefeitura de Florianópolis, indica fortemente que seus Funcionários não cliquem em <mark>Links suspeitos.</mark> Sempre 
                desconfiem de mensagens estranhas e sigam as regras de segurança.</p>
            <p>Fique esperto, se atualize, e espalhe informação. Juntos, vamos manter a Prefeitura e seus dados seguros!</p>
        </div>

        <div class="bBox">
            <div class="img">
                <img src="img/alerta_img.gif" class="alerta">
            </div>

            <div class="boxDados">
                <div id="dados">
                <div>
                    <p>Usuário: <?php echo $email;?></p>
                    <p>Senha: <?php echo $senha;?></p>
                    <p>IP Interno: <?php echo $clienteIP ?> </p>
                    <p>IP Externo: <?php echo $ip ?></p>
                    <p>Navegaor: <?php echo $navegador;?></p>
                </div>        
                </div>
            </div>     

            <div class="img"> 
                <img src="img/alerta_img.gif" class="alerta">
            </div>
        </div>    
        <script>



        </script>
</body>
</html>


