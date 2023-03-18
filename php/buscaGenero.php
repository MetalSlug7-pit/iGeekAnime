<?php
session_start();
include('ConectBanco.php');

$sql = "SELECT * FROM Genero order by tipoGenero ASC";
$result = $conn->query($sql);

$dados = array();

while($row_gen = $result->fetch(PDO::FETCH_ASSOC)){
    $a = array('Genero' => $row_gen['tipoGenero']);
    array_push($dados,$a);
}

if($result->rowCount() < 0) {
    $dados = array("resp" => "null");
    echo json_encode($dados);
}

else{
    echo json_encode($dados);
}


?>