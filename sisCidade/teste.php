<?php
include("conexao.php");

$mySQL = new MySQL;
$rsClientes = $mySQL->executeQuery("SELECT * FROM conograma;");
$rsClientes_totalRows = mysqli_num_rows($rsClientes);
$mySQL->disconnect;

while ($row_rsClientes = mysqli_fetch_array($rsClientes))
{
echo $row_rsClientes["id"];
}
?>