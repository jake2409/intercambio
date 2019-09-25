<?php
include 'conexao.php';
$mySQL = new MySQL;
session_start();
$tarefa = $_POST['txtNome'];
$duracao = $_POST['txtDuracao'];
$inicio = $_POST['txtDInicio'];
$final = $_POST['txtDFinal'];
$prioridade = $_POST['txtPrioridade'];
$funcionario = $_POST['txtFuncionario'];
$status = $_POST['txtStatus'];

$rsUsuario = $mySQL->executeQuery("INSERT INTO conograma(tarefas,duracao,inicio,final,prioridade,funcionario,estatus) VALUES ('$tarefa','$duracao','$inicio','$final','$prioridade','$funcionario','$status');");
header('location:cronograma.php');
?>