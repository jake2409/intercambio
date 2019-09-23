<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <title>SisSchool</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body onload="carregar()">
  <header>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SisEscola</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="aluno.php">Aluno</a></li>
      <li ><a href="professor.php">Professor</a></li>
      <li ><a href="diretor/diretor.php">Diretor</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  </header>
  
  <section>
    <div id="msg">
      Aqui vai aparacer a mensagem 
    </div>
    <div id ="foto">
        <img  id ="imagem"src="img/manha.png">
      </div>
    <h1 id='msg1'>Aqui vai aparecer o Bom dia!</h1>
  </section>

  <footer>
      <p>&copy; Gabriel Programandor</p>
  </footer>
  <script src="script.js"></script>
</body>
</html>