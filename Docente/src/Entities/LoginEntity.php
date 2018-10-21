<?php

  class LoginEntity{
    private $siape;
    private $nomeCompleto;
    private $email;
    private $dataNascimento;
    private $areaAtuacao;
    private $lotacao;
    private $cargo;
    private $senha;


    function __construct($siape=null,$nomeCompleto=null,$email=null, $dataNascimento=null,$areaAtuacao=null,$lotacao=null,$cargo=null, $senha=null){
      $this->siape = $siape;
      $this->nomeCompleto = $nomeCompleto;
      $this->email = $email;
      $this->dataNascimento = $dataNascimento;
      $this->areaAtuacao = $areaAtuacao;
      $this->lotacao = $lotacao;
      $this->cargo = $cargo;

      if ($senha==null) {
        $this->senha=$senha;
      }else{
        $this->senha = md5($senha);
      }
    }
    function setSiape($siape){
      $this->siape=$siape;
    }
    function getSiape(){
      return $this->siape;
    }

    function setNomeCompleto($nomeCompleto){
      $this->nomeCompleto=$nomeCompleto;
    }
    function getNomeCompleto(){
      return $this->nomeCompleto;
    }


    function setEmail($email){
      $this->email=$email;
    }
    function getEmail(){
      return $this->email;
    }


    function setDataNascimento($dataNascimento){
      $this->dataNascimento=$dataNascimento;
    }
    function getDataNascimento(){
      return $this->dataNascimento;
    }


    function setAreaAtuacao($areaAtuacao){
      $this->areaAtuacao=$areaAtuacao;
    }
    function getAreaAtuacao(){
      return $this->areaAtuacao;
    }


    function setLotacao($lotacao){
      $this->lotacao=$lotacao;
    }
    function getLotacao(){
      return $this->lotacao;
    }


    function setCargo($cargo){
      $this->cargo=$cargo;
    }
    function getCargo(){
      return $this->cargo;
    }

    function setSenha($senha){
      $this->senha=md5($senha);
    }
    function getSenha(){
      return $this->senha;
    }
  }


 ?>
