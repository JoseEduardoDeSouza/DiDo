<?php

class BaseDAO{
  public $connection;

  public function criaConexao(){
    $this->connection = new mysqli("localhost", "root", "Database2018*", "sistemaDocente");

    if ($this->connection->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
  }
  public function fechaConexao(){
    $this->connection->close();
  }

  /* Executa um comando SQL que não retorna resultado (INSERT, UPDATE, DELETE) */
  public function executaSQL($sql){
    $this->criaConexao();

    if (!$this->connection->query($sql)) {
			die("Erro ao executar consulta no banco" . "<br>" . $this->connection->error . "<br>" . $sql);
		}

    $this->fechaConexao();

    return true;
  }
  /* Executa uma consulta SQL e retorna o resultado (SELECT) */
  public function selecionar($sql){
    $this->criaConexao();

    if (!$res = $this->connection->query($sql)) {
			die("Erro ao executar consulta no banco" . "<br>" . $this->connection->error . "<br>" . $sql);
		}

    $this->fechaConexao();

    return $res;
  }
}
 ?>
