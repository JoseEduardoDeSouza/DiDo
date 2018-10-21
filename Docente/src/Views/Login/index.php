<!DOCTYPE html>
<html>
<head>
	<title>TCC</title>

	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="icon" type="imagem/png" href="assets/media/favicon.png" />



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


</head>
<body>
	<div class="bg"></div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
			<div class="formulario">
				<h1 class="er"> Gerenciador de arquivos</h1>
				<form class="tabela" method="post" id="tabela">
					<input type="text" name="siape" placeholder="SIAPE" class="form-control">
					<input type="password" name="senha" placeholder="Senha" class="form-control">
					<input type="button" value="Entrar" class="btn btn-secondary" onclick="logar()">

				</form>
				<a href="" data-toggle="modal" data-target="#exampleModal">Não possui conta? Crie uma!</a>



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

        <form method="post" id="formulario">
      <div class="modal-body">

					<input type="text" name="siape" placeholder="Siape" class="form-control esp-modal" onblur="myFunction(this)">
        	<input id="nomeCompleto" type="text" name="nome" placeholder="Nome Completo" class="form-control esp-modal">
					<input type="email" name="email" placeholder="E-mail" class="form-control esp-modal">
					<input type="date" name="data" placeholder="Data de Nascimento" class="form-control esp-modal">
        	<input type="text" name="area" placeholder="Area de Atuação" class="form-control esp-modal">
					<input id="lotacao" type="text" name="lotacao" placeholder="Lotação" class="form-control esp-modal">
					<input id="cargo" type="text" name="cargo" placeholder="Cargo" class="form-control esp-modal">
					<input type="password" name="senha" placeholder="Senha" class="form-control esp-modal">




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" class="btn btn-primary" onclick="cadProf()">
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
