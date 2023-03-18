<?php
session_start();
include('ConectBanco.php');

$nomeObra = filter_input(INPUT_POST, 'nomeObra', FILTER_SANITIZE_STRING);   

$sql = "SELECT DISTINCT * FROM obras WHERE nome LIKE '%$nomeObra%'";

$result = $conn->query($sql);

if($result->rowCount() > 0) {
?>
    <?php
		while($row_obras = $result->fetch(PDO::FETCH_ASSOC)){
    ?>

	<div class="container">
		<div class="recomendacao">
			<div class="obras">
				<div class="obra">
					<img src="../<?php echo $row_obras['imagemObra'];?>">
					<h3><?php echo $row_obras['nome'];?></h3>
					<a href="alterarObras.php?id=<?php echo $row_obras['obras_id'];?>" class="overlay"></a>
				</div>
			</div>
		</div>
	</div>

    <?php
        }
    ?>

    <?php
    }else{
    $_SESSION['obra_nao_encontrada'] = TRUE;;
	}
	?>