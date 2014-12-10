<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/crud.css" type="text/css">
	<link rel="stylesheet" href="css/cadastro.css" type="text/css">
	<?php include_once '../controller/MedicoCtr.class.php'; ?>
</head>
<body>
	<header>
		<form action="cadastrarMedico.php" method="post">
			<input type="submit" name="adicionar" class="form-component button button-add" value="Cadastrar Médico"/>			
		</form>		
	</header>		

	<?php 
		try{
			$ctr = new MedicoCtr();
			$medicos = $ctr->getLista();

			if($medicos != NULL){

				foreach($medicos as $medico){ 
				?>
					<article id="form-wraper">
					
					<div class="form-group">
						<label>CRM:</label>						
						<span class="input"><?php echo $medico['crm'];?></span>
					</div>
						<div class="form-group">
						<label>Nome:</label>						
						<span class="input"><?php echo $medico['nome'];?></span>
					</div>
						<div class="form-group">
						<label>Telefone:</label>
						<span id="telefone" class="input"><?php echo $medico['telefone'];?></span>
					</div>
						<div class="form-group">
						<label>Celular:</label>
						<span class="input"><?php echo $medico['celular'];?></span>
					</div>
						<div class="form-group">
						<label>Email:</label>
						<span class="input"><?php echo $medico['email'];?></span>
					</div>					
					
					
					<span class='form-component table-column list-button update'><a href= <?php echo strtr($medico['nome'], array(" " => "%20"));?> >Alterar</a></span>
					<span class='form-component table-column list-button delete'><a href= <?php echo "excluirMedico.php?id=" . $medico['crm'];?> >Excluir</a></span>				
				</article>
	
	  <?php 
				} 
			}else{
				?> <div class='message success' > Não há médicos na lista.</div><?php
			}
		}catch(Exception $ex){
		   ?>
				<div class="message fail"> <?php echo $ex->getMessage(); ?></div> 
		<?php
			}
		?>
	
</body>	
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/listar.js"></script>
</html>