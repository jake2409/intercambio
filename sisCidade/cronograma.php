<?php
  include("conexao.php");
  $mySQL = new MySQL;
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:acesso.php');
  }
  $logado = $_SESSION['login'];

  $rsCronograma = $mySQL->executeQuery("SELECT * FROM conograma;");//Executa a função executeQuery e armazena na variavel

  if (isset($_GET["txtPesquisa"])){//Verifica se o campo txtPesquisa esta com um valor nulo
    $pesq = $_GET["txtPesquisa"];
    $sqlPesq = $mySQL->executeQuery("SELECT * FROM conograma WHERE id LIKE '$pesq' or tarefas LIKE '$pesq';");
  }else{//Caso o valor seja nulo a variavel pesquisa ficará com o uma string vazia
    $pesq = "";
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href='css/estilo.css'>
    <title>SisCidade</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">SisCidade</a>
        </div>
        <ul class="nav navbar-nav">
          <li ><a href="cronograma.php">Cronograma</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="sair.php"><span class="glyphicon glyphicon-log-in"></span>Sair</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <section>
  <div class="form">
    <form method="get" action="cronograma.php">
      <input type="text" name="txtPesquisa" size="25">
      <input type="submit" name="btnPesquisar" value="Buscar">
    </form>
  </div>
  <?php 

  ?>
  <?php

    echo "<table border=1>";
    echo "<tr>
      <th> Id </th>
      <th> Tarefa </th>
      <th> Duração </th>
      <th> Início </th>
      <th> Final </th>
      <th> Prioridade </th>
      <th> Funcionário </th>
      <th> Status </th>
      </tr>";
      if(isset($_GET["txtPesquisa"])){
        if(mysqli_num_rows($sqlPesq) > 0){//Verifica se o existem linhas no banco de acordo com o select feito 
          while($row_rsCronograma = mysqli_fetch_array($sqlPesq)){//Armazena os dados em vetores com indices associativos 
            echo "<tr>
            <th>".$row_rsCronograma['id']."</th>
            <th>".$row_rsCronograma['tarefas']."</th>
            <th>".$row_rsCronograma['duracao']."</th>
            <th>".$row_rsCronograma['inicio']."</th>
            <th>".$row_rsCronograma['final']."</th>
            <th>".$row_rsCronograma['prioridade']."</th>
            <th>".$row_rsCronograma['funcionario']."</th>
            <th>".$row_rsCronograma['estatus']."</th>";
            echo "<th><a href='delete.php?id=".$row_rsCronograma['id']."'><img src='img/x.png'></a></th>
            </tr>";
          }
        }
      }
    if(isset($_GET["txtPesquisa"]) == null){//Verifica se o usuario do sistema está fazendo uma pesquisa para assim limpar os campos apresentados a baixo
      $rsUsuario_totalRows = mysqli_num_rows($rsCronograma);
      while($row_rsCronograma = @mysqli_fetch_array($rsCronograma)){
        echo "<tr>
          <th>". $row_rsCronograma['id']."</th>
          <th>". $row_rsCronograma['tarefas']."</th>
          <th>".$row_rsCronograma['duracao']."</th>
          <th>".$row_rsCronograma['inicio']."</th>
          <th>".$row_rsCronograma['final']."</th>
          <th>".$row_rsCronograma['prioridade']."</th>
          <th>".$row_rsCronograma['funcionario']."</th>
          <th>".$row_rsCronograma['estatus']."</th>";
        echo "<th><a href='delete.php?id=".$row_rsCronograma['id']."'><img src='img/x.png'></a></th>
        </tr>";
      }
      echo "</table><br><br>";
      echo "<a href='criarcrono.php'> <input type='button' value='Criar nova tarefa!!'></a>";
  }
  ?>

  </section>
</body>
</html>