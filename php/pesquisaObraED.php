<?php
session_start();
include('ConectBanco.php');

$nomeObra = filter_input(INPUT_POST, 'nomeObra', FILTER_SANITIZE_STRING);   

$sql = "SELECT DISTINCT * FROM obras WHERE nome LIKE '%$nomeObra%'";

$result = $conn->query($sql);
$linhas = $result->rowCount();

if($result->rowCount() > 0) {
?>
    <?php
		while($row_obras = $result->fetch(PDO::FETCH_ASSOC)){
		$imgs[] = $row_obras;
    ?>

	<div class="container">
		<div class="recomendacao">
			<div class="obras">	
				<div class="obra">
					<img src="../<?php echo $row_obras['imagemObra'];?>">
					<h3><?php echo $row_obras['nome'];?></h3>
					<a onclick="document.getElementById('removeObraModal').style.display='block'" data-bs-toggle="modal" data-bs-target="#removeObraModal-<?php echo $row_obras['obras_id'];?>" class="overlay"></a>
				</div>
			</div>
		</div>
	</div>

    <?php
        }
    ?>

	<?php 
	}else{
    	$_SESSION['obra_nao_encontrada'] = TRUE;
	?>

	<?php
			if($linhas==0){
			}
			else{
				foreach($imgs as $row_obra){
					?>
					<div class="modal" id="removeObraModal-<?php echo $row_obra['obras_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						
					
					<div class="modal-dialog" style="width:400px; margin-top:300px;">

							<div class="modal-content" style="background-color:#171616; border:none;">
								<div class="modal-header" style="border:none;">
									<h5 class="modal-title" id="exampleModalLabel" style="margin-left:70px; color:white;">Deseja excluir essa obra?</h5>
								</div>

								<img src="../<?php echo $row_obra['imagemObra'];?>" width="200px" height="250px" style="margin-left:100px; margin-top:10px;">
									<div class="botoes">
										<?php echo "<a href=../php/excluirObra.php?id=".$row_obra['obras_id'].">";?><button class="btn btn-primary" style="margin-top:30px; background-color:green;">Sim</button></a>
										<button class="btn btn-secundary" data-bs-dismiss="modal" style="margin-top:30px; margin-left:50px; background-color:red; color:white;">&times</button>
									</div><br>
							</div>
						</div>
					</div>
			<?php
				}
			}
				?>
    <?php
}
?>