<?php
class conexao{
    function conexao(){
        $servidor ="localhost";
        $user = "root";
        $password = "77508416@Gab";
        $db = "dbEscola";

        $conection = @mysqli_connect($servidor,$user,$password,$db)
        or die ("[ERROR]Ocorreu um erro ao se conectar com o banco de dados");
    }
}
?>