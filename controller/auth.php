<?php
session_start();
require "../model/connect-db.php";

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$entrar = $_POST["entrar"];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM usuarios WHERE usuario = 'admin'";
$result1 = $conn->query($sql1);

if(isset($entrar)){
    if(empty($_SESSION['token_auth']) && empty($_SESSION['token_authAdmin'])){
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row1 = $result1->fetch_assoc();

            if($usuario == $row1['usuario'] && $senha == $row1['senha']){
                $_SESSION['token_authAdmin'] = md5($senha);
                header("location: redirect.php");
            } else if($row['senha'] == $senha){
                $_SESSION['token_auth'] = $usuario;
                header("location: redirect.php");
            } else {
                $_SESSION['senhaIncorreta'] = '123';
                header('location: ../view/login.php');
            }
        } else {
            $_SESSION['userNo'] = '123';
            header('location: ../view/login.php');
        }
    } else {
        $_SESSION['loginFeito'] = '123';
        header('location: ../view/login.php');
    }
} else {
    header('location: ../index.php');
}
?>