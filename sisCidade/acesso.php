<?php
    include("conexao.php");//Chamando a pagina de conexão
    $mySQL = new MySQL;//Instanciando a classe
    session_start(); //Iniciando uma sessão
    $login = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];

    $rsUsuario = $mySQL->executeQuery("SELECT * FROM usuario where login ='$login' and senha ='$senha' and ativo ='s';");//Armazenando os dados trazidos do banco pelo metodo em uma variavel
    $rs_totalRows = mysqli_num_rows($rsUsuario);//Retorna o numero de linhas do banco


    if($rs_totalRows > 0){ //Essa condição é responsável por efetuar o loguin
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location:cronograma.php');
    }
    else{
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header ('location:erro.html');
    }
?>
