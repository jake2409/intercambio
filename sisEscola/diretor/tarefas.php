<?php
$servidor ="localhost";
$user = "root";
$password = "77508416@Gab";
$db = "dbEscola";

$conection = @mysqli_connect($servidor,$user,$password,$db)
or die ("[ERROR]Ocorreu um erro ao se conectar com o banco de dados");

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:diretor.php');
  }
 
$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SisSchool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<body onload="carregar()">
  <header>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="indexd.php">SisEscola</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="aluno.php">Administrar Alunos</a></li>
      <li ><a href="professor.php">Administrar Professores</a></li>
      <li class="active"><a href="tarefas.php">Tarefas do Diretor</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
    </ul>
  </div>
</nav>
</header>
<section>
<?php
  $sql = "select * from tarefas";
  $query = @mysqli_query($conection,$sql);

  echo "<table border=3>
  <tr>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Data</th>
    </tr>";
 
  while($dados = @mysqli_fetch_array($query)){
    $date = $dados['dataa'];
    $datet = (int)substr($date,0,2);
    if(!($datet > date('d'))){
    echo "<tr>
    <th>".$dados['nome']."</th>
    <th>".$dados['descricao']."</th>
    <th>".$dados['dataa']."</th>
    </tr>";
    }
  }
  echo "</table><br><br>"
?>
<a href="tarefa.php"> <input type="button" value="Criar nova tarefa!!" ></a>
</section>
</body>
</html>