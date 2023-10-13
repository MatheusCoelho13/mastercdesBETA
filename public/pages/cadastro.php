<?php
$tokengoogle=$_POST[""]
?>
<!DOCTYPE html>
<html lang ="en">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="../css/cadastro.css">

<link href="https://fonts.googleapis.com/css2?family=Aladin&family=Barlow&family=Chakra+Petch&family=Chelsea+Market&family=Inter:wght@500&family=Nerko+One&family=Ovo&family=Roboto+Condensed&family=Ubuntu&display=swap" rel="stylesheet">
    <title>Mastercode Cadastro</title>
    <script src="https://accounts.google.com/gsi/client" async></script>
<script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/logo2 2-128.png" type="image/x-icon"/>
</head>
<body>
    <div id="Content3">
    <h1 id="h1_forms"> Cadastre  para ter acesso ao conteudo do Curso</h1>
        <form action="../../api/cadastrar.php" method="post" id="cad-usuario-form">
           <h3 id="h3_forms"> Dados da entidade</h3>
           <div class="name_input">
            <p id="name_p" class="input_p">nome</p>
            <input type="name" name="nome" class="forms_input" class="name_foms"id="nomee" autocomplete="off"   >
           </div>
           <div class="email_input">
           <p id="email_p"class="input_p">email</p>

            <input type="name" name="email" class="forms_input" class="email_foms" id="emaill"autocomplete="off"  >
           </div>
           <div class="senha_input">
           <p id="senha_p"class="input_p">senha
           </p>
            <input type="password" name="Senhaa" class="forms_input" class="senha_foms" id="senhaa" autocomplete="off" >
           </div>
            <div class="conemail_input">
           <p id="conemail_p"class="input_p">confimar email</p>
            <input type="conemail" name="conemail" class="forms_input" class="conemail_foms" >
           </div>
           
           <div class="consenha_input">
           <p id="consenha_p"class="input_p">confimar senha</p>
            <input type="password" name="conpass" class="forms_input" class="consenha_foms"  >
           </div>
          <div class="checkbox"><input type="checkbox" id="acordo" name="acordo" />
    <label for="acordo" id="text_check">EU concordo com os <a id="termos_a" href="./termos">Termos</a></label></div>
    <script>
      function handleCredentialResponse(response) {
        const data = jwt_decode( response.credential);
        console.log(data)
      }
      window.onload = function () {
        google.accounts.id.initialize({
          client_id: "736429798352-5bdfd6bgctui5dhqa9ef6sc5v5tdqkfd.apps.googleusercontent.com",
          callback: handleCredentialResponse
        });
        google.accounts.id.renderButton(
          document.getElementById("buttonDiv"),
          { theme: "outline", size: "large" }  // customization attributes
        );
        google.accounts.id.prompt(); // also display the One Tap dialog
      }
    </script>
    <div id="buttonDiv"></div>>

          <input type="submit" disabled  id="button_isfalse"><img  id="img_buttonoff" src="../../images/contract1 1.svg" alt=""><p id="h6_a">concluir cadastro</p></button>
          
          <div id="alert"></div>
      

        <div class="githubauth"></div>
        

        </form>
    </div>
 
</div>
<script src="../../api/js/index.js"></script>
<script src="../../api/js/sweetalert2.js"></script>
<script src="../../api//js//minmastercode.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

  
<header>
<div class="menu_top">

<div class="img"></a><img src="../../images/logo2.png" alt="logo"id="img_logo2"></div>
<a href="./index.php" class="route" id="Home">Home</a>
<a href="./api/logs.php" class="route" id="Logs">Logs</a>
<a href="./api/api.php" class="route" id="Api">Api</a>
<a href="./api/plans.php" class="route" id="Planos">Planos</a>
<a href="./api/Quem.php" class="route" id="Quem">Quem </a>
<a href="./api/Faq.php" class="route" id="Faq">faq</a>
<a href="./api/Termos.php" class="route" id="Termos">termos</a>
<a href="./api/Suprir.php" class="route" id="Suprir">Suprir©<a>
<a href="./public/pages/Login.php" class="route" id="Login_2">Login<a>
<a href="./Planos</aublic/pages/cadastro.php" class="route" id="Cadastro_2">Cadastro<a>
</header>
</html>
?>