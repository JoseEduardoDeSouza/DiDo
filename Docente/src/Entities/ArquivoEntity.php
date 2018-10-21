<?php

/**
 *
 */
class ArquivoEntity{
  private $id,$docente_siape,$turma_id,$nome,$local;

  function __construct($id=null,$docente_siape=null,$turma_id=null,$nome=null,$local=null){
    $this->id=$id;
    $this->docente_siape=$docente_siape;
    $this->turma_id=$turma_id;
    $this->nome=$nome;
    $this->local=$local;
  }

  function setId($id){
    $this->id=$id;
  }
  function getId(){
    return $this->id;
  }

  function setDocenteSiape($docente_siape){
    $this->docente_siape=$docente_siape;
  }
  function getDocenteSiape(){
    return $this->docente_siape;
  }

  function setTurmaId($turma_id){
    $this->turma_id=$turma_id;
  }
  function getTurmaId(){
    return $this->turma_id;
  }

  function setNome($nome){
    $this->nome=$nome;
  }
  function getNome(){
    return $this->nome;
  }

  function setLocal($local){
    $this->local=$local;
  }
  function getLocal(){
    return $this->local;
  }
}

  ?>
