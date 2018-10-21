<?php


  include_once('src/Entities/ArquivoEntity.php');
  include_once('src/Models/ArquivoModel.php');
function GetTable($siape){
   $turmaModel;
   $arquivoModel;
  $turmaModel = new TurmaModel();
  $arquivoModel = new ArquivoModel();

  $sql_get = "select ano, local,nome from arquivo,turma where docente_siape = $siape and turma.id = turma_id;";
  $arquivos = $arquivoModel->obterPorSiape($siape);

  $retorno = '<h2 class="er"> Arquivos Enviados</h2><table class="table table-hover">
    <thead>
      <tr>
        <th>Ano</th>
        <th>Arquivo</th>
      </tr>
    </thead>
    <tbody>
      ';

  foreach ($arquivos as $arquivo) {
    $retorno .= "<tr><td>".$arquivo->getTurmaId()."</td>"."<td><a href='".$arquivo->getLocal()."'>".$arquivo->getNome()."</td></tr>";
  }
  $retorno .="</tbody>
</table>";
  return $retorno;
}
?>
