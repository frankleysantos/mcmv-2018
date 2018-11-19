<?php  
/**
 * 
 */
class Bairros
{
	
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function listaBairros(){
		$sql = $this->pdo->prepare("SELECT * FROM bairros");
		$sql->execute();
		return $sql->fetchAll();
	}

	public function listaBairroID($bairro){
		$sql = $this->pdo->prepare("SELECT * FROM bairros WHERE nome = :bairro");
		$sql->bindValue(":bairro", utf8_encode($bairro));
		$sql->execute();
		return $sql->fetchAll();
	}

	public function inserirBairro($bairro){
        $sql = $this->pdo->prepare("INSERT INTO bairros (nome) VALUES (:bairro)");
		$sql->bindValue(":bairro", utf8_decode($bairro));
		return $sql->execute();
	}
}
?>