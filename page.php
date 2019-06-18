<?php
/*se for usar $_SESSION, isso é necessário */
session_start(); 
$usuario = $_POST['login'];
$password = $_POST['password'];
$firstTime = true;
/* usuarios permitidos */
$usuarios = [
    array('login'=>'marcos', 'password'=>'123'),
    array('login'=>'diego', 'password'=>'olamundo'),
    array('login'=>'lucas', 'password'=>'1234'),
    array('login'=>'pedro', 'password'=>'123'),
];

$autenticado = false;

if(!empty($usuario) || !empty($password)){
    $firstTime = false;
}
/* *Percorre o array $usuarios, veja a versão do for normal abaixo*/
foreach($usuarios as $variavel){
    if($usuario == $variavel['login'] && $password == $variavel['password']){
        $autenticado = true;
        break;
    }
}
/* Esse for faz o mesmo que o de cima, compare os dois!*/
// for($i=0;i<sizeof($usuarios); $i++){
//     if($usuario == $usuarios[$i]['login'] && $password == $usuarios[$i]['password']){
//         $autenticado = true;
//         break;
//     }
// }

/* Se não estiver autenticado, volte para a index */
if($autenticado){
    /* A declaração da SESSION ocorre aqui */
    $_SESSION['usuario'] = $usuario;
    header('Location: home.php');
} else if (!empty($usuario) && !empty($password) && $firstTime==false) {
    echo "<script type='text/javascript'> alert('Usuário ou senha errado!');</script>";
    /*Perceba que eu tirei o parâmetro "erro" da url, olhe lá na index*/
    //header('Location: /');
    /*Na capacitação foi feito assim, retire o comentário abaixo
    e da index se quiser mudar a forma de verificar o erro*/
    // header('Location: index.php?erro=')// opcao2;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./assets/css/style.css">
	<title>Teste</title>
</head>
<body class="body">
    <style>
        body{
            background-color:  pink;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        </style>
    <div id="form">
<form action="page.php" method="POST">
    LOGIN<br>
    <input type="text" name="login" placeholder="LOGIN"><br>
    PASSWORD<br>
    <input type="password" name="password" placeholder="PASSWORD"><br>
    <in namafirst valuw=uybugu
    <input type="submit" value="SING IN">
</form>
</div>
</body>
</html>