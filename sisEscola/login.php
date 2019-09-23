<?php
$servidor ="localhost";
$user = "root";
$password = "77508416@Gab";
$db = "dbEscola";

$conection = @mysqli_connect($servidor,$user,$password,$db)
or die ("[ERROR]Ocorreu um erro ao se conectar com o banco de dados");

session_start();
$login = $_POST['txtUsuario'];
$senha = $_POST['txtSenha'];


$sql = "select * from usuario where login ='$login' and senha ='$senha' and cargo = 'd'";
$result = mysqli_query($conection,$sql);

if(mysqli_num_rows($result)> 0){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:diretor/indexd.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header ('location:erro.php');
}
?>

