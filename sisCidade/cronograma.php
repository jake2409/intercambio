<?php
include("conexao.php");
$mySQL = new MySQL;
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
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Sair</a></li>
    </ul>
  </div>
    </nav>
  </header>
  <section>
  <?php
    $rsUsuario = $mySQL->executeQuery("SELECT * FROM conograma;");
    $rsUsuario_totalRows = mysqli_num_rows($rsUsuario);

  echo "<table border=3>
  <tr>
    <th>id</th>
    <th>tarefa</th>
    <th>duração</th>
    <th>inicio</th>
    <th>final</th>
    <th>prioridade</th>
    <th>funcionario</th>
    <th>estatus</th>
    </tr>";

  while($row_rsUsuario = @mysqli_fetch_array($rsUsuario)){
    echo "<tr>
    <th>".$row_rsUsuario['id']."</th>
    <th>".$row_rsUsuario['tarefas']."</th>
    <th>".$row_rsUsuario['duracao']."</th>
    <th>".$row_rsUsuario['inicio']."</th>
    <th>".$row_rsUsuario['final']."</th>
    <th>".$row_rsUsuario['prioridade']."</th>
    <th>".$row_rsUsuario['funcionario']."</th>
    <th>".$row_rsUsuario['estatus']."</th>
    </tr>";  
  }
  echo "</table><br><br>"
?>
<a href="criarcrono.php"> <input type="button" value="Criar nova tarefa!!"></a>
  </section>
</body>
</html>