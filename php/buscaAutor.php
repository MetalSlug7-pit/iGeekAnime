<?php
session_start();
include('ConectBanco.php');

$sql = "SELECT * FROM Autor order by nomeAutor ASC";
$result = $conn->query($sql);

$dadosAutor = array();

while($row_aut = $result->fetch(PDO::FETCH_ASSOC)){
    $a = array('Autor' => $row_aut['nomeAutor']);
    array_push($dadosAutor,$a);
}

echo json_encode($dadosAutor);

?>