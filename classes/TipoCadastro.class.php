<?php  
class TipoCadastro
{
	 private $pdo;

	 public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}


	public function listar()
	{
		$sql = $this->pdo->prepare("SELECT * FROM tipo_cadastro");
		$sql ->execute();
		return $sql->fetchAll();
	}
}
?>