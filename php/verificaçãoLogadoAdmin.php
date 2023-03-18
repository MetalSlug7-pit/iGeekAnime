<?php
session_start();
if(!$_SESSION['adminLogado']){
    header('Location: ../index.php');
    exit();
}