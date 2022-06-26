<?php

$servidor = "localhost";
$banco = "id19063419_danca_de_salao";
$usuario = "id19063419_rootdanca";
$senha = "Xbox720v8@_2002";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if (!$conn){
    die("A conexão falhou: " . mysqli_connect_error());
}
echo "A conexão foi efetuada com sucesso!<br>"

?>