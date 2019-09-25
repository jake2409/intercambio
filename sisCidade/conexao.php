<?php 
    class MySQL {
        var $host="localhost";
        var $user="root";
        var $password="77508416@Gab";
        var $database="dbCidade";
        var $query;
        var $link;
        var $result;
    function MySQL(){
            
    } 
    function connect() {
        $this->link=mysqli_connect($this->host,$this->user,$this->password);
        if(!$this->link){
        echo "Falha na conexão com o Banco de Dados!<br />";
        echo "Erro: " . mysql_error();
        die();
        }
        elseif(!mysqli_select_db($this->link,$this->database))
        {
        echo "O Bando de Dados solicitado não pode ser aberto!<br />";
        echo "Erro: " . mysql_error();
        die();
        }
        }

        //Esta função executa uma Query
        function executeQuery($query)
        {
        $this->connect();
        $this->query=$query;
        if($this->result=mysqli_query($this->link,$this->query))
        {
        $this->disconnect();
        return $this->result;
        }
        else
        {
        echo "Ocorreu um erro na execução da SQL";
        echo "Erro :" . mysqli_error($this->link);
        echo "SQL: " . $query;
        die();
        disconnect();
        }
        }
        
        //Esta função desconecta do Banco
        function disconnect()
        {
        return mysqli_close($this->link);
        }
        }

?>