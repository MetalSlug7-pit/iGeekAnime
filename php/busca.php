<?php
    session_start();

    if(!isset($_GET['nome_obra'])){
        ("location: ../index.php");
        exit;
    }

    $nome = $_GET['nome_obra'];

    include('ConectBanco.php');

    $sql = "SELECT * FROM Obras WHERE nome LIKE '%$nome%'";
    
    if($conn->query($sql)==TRUE){
        $_SESSION['Obra_Buscada'] = TRUE;
        header('Location: ../paginas/obraBuscada.php?nome='.$nome);
        exit;
    }
?>