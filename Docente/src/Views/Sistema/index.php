<?php
include_once 'server/verifica_sessao.php';
include_once 'server/conexao.php';


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>TCC</title>

	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="icon" type="imagem/png" href="assets/media/favicon.png" />

	</script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</head>

<body>
	<div class="bg-2"></div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

				<h2 class="er titulo"> Bem vindo Professor(a) <?=$nome ?></h2>
			<div class="formulario">
				<form method="post" id="enviarArquivo" enctype="multipart/form-data">
					<select class="form-control" name="ano">
						<option style="display:none;">Selecione uma turma</option>
						<?php

            foreach ($turmas as $turma ) {
              echo "<option value='".$turma->getId()."'>".$turma->getAno()."</option>";
            }

             ?>

					</select>

					<a href="" data-toggle="modal" data-target="#exampleModal">Não possui a turma cadastrada? Cadastre uma!</a>
					<input type="text" name="nome" placeholder="Nome" class="form-control">
					<input type="file" name="arquivo" class="form-control" id="file-select"><br>
          <button type="button" class="btn btn-secondary" onclick="cadArquivo()">Cadastrar</button>

				</form>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-60" id="pos">
      <a class="sair" href="/sistema/sair" >sair</a>
			<div class="tabela">

				<?php
          include "showTableFile.php";
          echo GetTable($_SESSION['siape']);
        ?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Docente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form class="cadTurma" method="post" >
      <div class="modal-body">

					<input type="text" name="ano" placeholder="Ano" class="form-control esp-modal">
        	<input type="text" name="curso" placeholder="Curso" class="form-control esp-modal">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="button"class="btn btn-primary" name="button" onclick="cadTurma()">Cadastrar</button>
      </div>
        </form>
    </div>
  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/xlsx.full.min.js"></script>
<script src="assets/js/main.js"></script>
</html>
