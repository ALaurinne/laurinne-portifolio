<?php
/*se for usar $_SESSION, isso é necessário */
session_start(); 
$usuario = $_POST['login'];
$password = $_POST['password'];

/* usuarios permitidos */
$usuarios = [
    array('login'=>'marcos', 'password'=>'123'),
    array('login'=>'diego', 'password'=>'olamundo'),
    array('login'=>'lucas', 'password'=>'1234'),
    array('login'=>'pedro', 'password'=>'123'),
];

$autenticado = false;

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
} else {
    echo "<script type='text/javascript'> alert('Usuario ou senha errado(s)!'); window.location='page.php';</script>";
    /*Perceba que eu tirei o parâmetro "erro" da url, olhe lá na index*/
    //header('Location: /');
    /*Na capacitação foi feito assim, retire o comentário abaixo
    e da index se quiser mudar a forma de verificar o erro*/
    // header('Location: index.php?erro=')// opcao2;
}
