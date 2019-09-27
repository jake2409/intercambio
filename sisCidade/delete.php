<?php  
    include 'conexao.php';
    $mySQL = new MySQL;
    session_start();
    $id = $_GET['id'];//pega o id selecionado pelo metodo _GET atraves da URL
    $rs_Usuario = $mySQL->executeQuery("DELETE FROM conograma WHERE id='$id';");//Realiza o delete de uma linha no banco de dados 
    header('location:cronograma.php');
?>