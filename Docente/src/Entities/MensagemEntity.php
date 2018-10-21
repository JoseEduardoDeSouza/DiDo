<?php
/**
 *
 */
class MensagemEntity{
  private $id,$nome,$mensagem,$turma;
  function __construct($id=null,$nome=null,$mensagem=null,$turma=null){
      $this->id=$id;
      $this->nome=$nome;
      $this->mensagem=$mensagem;
      $this->turma=$turma;
  }

  function setId($id){
    $this->id=$id;
  }
  function getId(){
    return $this->id;
  }

  function setNome($nome){
    $this->nome=$nome;
  }
  function getNome(){
    return $this->nome;
  }

  function setMensagem($mensagem){
    $this->mensagem=$mensagem;
  }
  function getMensagem(){
    return $this->mensagem;
  }

  function setTurma($turma){
    $this->turma=$turma;
  }
  function getTurma(){
    return $this->turma;
  }

}

 ?>
