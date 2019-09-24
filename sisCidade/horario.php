<?php
class horario{
    function carregar(){
        date_default_timezone_set('America/Sao_Paulo');//Essa função transforma a horario do servidor em America/São Paulo
        $data = date('H');//Pega o horario do servidor
        $hour = date('i');//Pega o minuto do servidor
        echo "Agora são ".$data.":".$hour."<br>";//exibe as variáveis
        if ($data >= 0 && $data <= 12){//cria a condição do horario ou seja, se for manha faz o primeiro bloco, tarde o segundo bloco e noite terceiro bloco
            echo "<img src='img/manha.png'>";
            echo "Bom Dia";
            echo "<style>.mudacor{ background-color:".'#e5cd9f'.";}</style>";
        }else if($data < 18){
            echo "<img src='img/tarde.gif'><br>";
            echo "Boa Tarde";
            echo "<style>body{ background-color:".'#b9846f'.";}</style>";
        }else {
            echo "<img src='img/noite.png'><br>";
            echo "Boa Noite";
            echo "<style>body{ background-color:".'#515154'.";}</style>";
        }
    }
}
?>