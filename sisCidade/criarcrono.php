<?php
include("conexao.php");
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
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
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body onload="carregar()"><!--essa tag onload serve para que toda vez que a pagina carregue ele execute o método que esta sendo solicitado-->
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
			<p>Nome da Tarefa:<br>
				<input type="text" name="txtNome" size="35">
			</p>
			<p>Duração da tarefa:<br>
				<input type="text" name="txtDuracao" size="35">
			</p>
            <p>Data de início:<br>
				<input type="text" name="txtDInicio" size="35">
			</p>
            <p>Data de finalização:<br>
				<input type="text" name="txtDFinal" size="35">
			</p>
            <p>Valor de prioridade:<br>
				<input type="text" name="txtPrioridade" size="35">
			</p>
            <p>Funcionário responsável:<br>
				<input type="text" name="txtFuncionario" size="35">
			</p>
            <p>Status da Tarefa:<br>
				<input type="text" name="txtStatus" size="35">
			</p>
			<input type="submit" name="btnAcesso" value="Cadastrar">
    </form>	
    </section>
</body>
</html>