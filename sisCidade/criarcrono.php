<?php
  include("conexao.php");
  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))// Verifica se o usuario ja esta logado
  {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:acesso.php');
  }
  $logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <title>SisCidade</title>
  <link rel="stylesheet" href="css/criarcrono.css">
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
      <form name="frmAcesso" method="post" action="insert.php">
        <p>Nome da Tarefa:
          <input type="text" name="txtNome" size="35">
        </p>
        <p>Duração da Tarefa:
          <input type="time" name="txtDuracao" size="35">
        </p>
          <p>Data de início:
          <input type="date" name="txtDInicio" size="35">
        </p>
              <p>Data de finalização:
          <input type="date" name="txtDFinal" size="35">
        </p>
              <p>Valor de prioridade:
          <input type="number" name="txtPrioridade" size="35">
        </p>
              <p>Funcionário responsável:
          <input type="text" name="txtFuncionario" size="35">
        </p>
              <p>Status da Tarefa:
          <input type="text" name="txtStatus" size="35">
        </p>
        <input type="submit" name="btnAcesso" value="Cadastrar">
        </form>	
    </section>


</body>
</html>