<?php
include("conexao.php");
session_start();
$login = $_POST['txtUsuario'];
$senha = $_POST['txtSenha'];
$mySQL = new MySQL;
$rsUsuario = $mySQL->executeQuery("SELECT * FROM usuario where login ='$login' and senha ='$senha' and ativo ='s';");
$rs_totalRows = mysqli_num_rows($rsUsuario);


if($rs_totalRows > 0){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:cronograma.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header ('location:erro.php');
}
?>