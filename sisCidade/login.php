<?php
include 'conexao.php';
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
      <a class="navbar-brand" href="index.php">SisEscola</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="cronograma.php">Cronograma</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
    </nav>
    </header>
    <section>
    <form name="frmAcesso" method="post" action="acesso.php">
			<p>Usuário:<br>
				<input type="text" name="txtUsuario" size="35">
			</p>
			<p>Senha:<br>
				<input type="password" name="txtSenha" size="35">
			</p>
			<input type="submit" name="btnAcesso" value="Acessar">
    </form>	
    </section>
</body>
</html>