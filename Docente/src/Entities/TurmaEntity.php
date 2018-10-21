<?php


class TurmaEntity{
  private $id,$ano,$curso;

  function __construct($id=null,$ano=null,$curso=null){
    $this->id=$id;
    $this->ano=$ano;
    $this->curso=$curso;
  }

  function setId($id){
    $this->id=$id;
  }
  function getId(){
    return $this->id;
  }

    function setAno($ano){
      $this->ano=$ano;
    }
    function getAno(){
      return $this->ano;
    }

      function setCurso($curso){
        $this->curso=$curso;
      }
      function getCurso(){
        return $this->curso;
      }
}

 ?>
