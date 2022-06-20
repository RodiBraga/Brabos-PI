<?php
    session_start();
    require_once "../util/config.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){        
        $login = $_POST["email"];
        $senha = $_POST["password"];
        $sql = "SELECT * FROM empresario WHERE login = ? AND senha = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) > 0){
            header('location: ../principais/principal.html');
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['senha'] = $row['senha'];
        } else {
            echo "Usuario ou senha inválido";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/style_Login.css">
    
    <title>tel de teste</title>
</head>
<body>
    <header class="cabeca">
        <a href="../principais/principal.html"><h4>hPa.com</h4></a>
    </header>
    <div>
        <div class="img"><img src="../imagens/hoteis.svg" class="left-login-image" alt="Hoteis"></div>
    </div>
        <div id="main-container">
            <h1>Login</h1>
            <form id="register-form" method="POST">
                <div class="full-box">
                    <label for="email">Usuário</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu E-mail">
                </div>
               
                <div class="half-box spacing">
                    <label for="password">senha</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua senha">
                </div>
                
                <div class="welde">
                    
                    <label for="agreement" id="agreement-label>">Ainda não tem conta? <a href="CadastroCliente.html">Cadastre-se</a></label><br>
                </div>
                <div class="full-box">
                    
                        <input type="submit" id="btn-submit" value="logar">
                    
                    
                    
                </div>
            </form>
        </div>
       
    
    <p class="error-validation template"></p>
    <script src="js/scripts.js"></script>
</body>
</html>