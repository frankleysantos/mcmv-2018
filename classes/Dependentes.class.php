<?php  
/**
 * 
 */
class Dependentes
{
	
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function inserirDependentes($tmpnome, $id_principal, $tmpidade, $tmpparentesco, $tmpdocumentacao, $tmpocupacao, $tmpremuneracao, $tmpoutras_rendas){
		$sql = $this->pdo->prepare("INSERT INTO dependentes (fk_id, nome, idade, parentesco, documentacao, ocupacao, remuneracao, outras_rendas) VALUES (:fk_id, :nome, :idade, :parentesco, :documentacao, :ocupacao, :remuneracao, :outras_rendas)");
		$sql->bindValue(":nome", utf8_decode($tmpnome));
		$sql->bindValue(":idade", $tmpidade);
		$sql->bindValue(":parentesco", utf8_decode($tmpparentesco));
		$sql->bindValue(":documentacao", $tmpdocumentacao);
		$sql->bindValue(":ocupacao", utf8_decode($tmpocupacao));
		$sql->bindValue(":remuneracao", $tmpremuneracao);
		$sql->bindValue(":outras_rendas", $tmpoutras_rendas);
		$sql->bindValue(":fk_id", $id_principal);
		return $sql->execute();
	}

	public function listaDependentes($dependente_id){
        $sql = $this->pdo->prepare("SELECT * FROM dependentes WHERE fk_id = :fk_id");
        $sql->bindValue(":fk_id", $dependente_id);
        $sql->execute();
        return $sql->fetchAll();
	}

	public function updateDependentes($id, $tmpdependente, $tmpnome, $tmpidade, $tmpparentesco, $tmpdocumentacao, $tmpocupacao, $tmpremuneracao, $tmpoutras_rendas){
		if (!empty($tmpdependente) && isset($tmpdependente)) {
		$sql = $this->pdo->prepare("UPDATE dependentes SET nome = :nome, idade = :idade, parentesco = :parentesco,
			parentesco = :parentesco, documentacao = :documentacao, ocupacao = :ocupacao, remuneracao = :remuneracao,
			outras_rendas = :outras_rendas
			WHERE dependente = :dependente AND fk_id = :fk_id");
		$sql->bindValue(":nome", utf8_decode($tmpnome));
		$sql->bindValue(":idade", $tmpidade);
		$sql->bindValue(":parentesco", utf8_decode($tmpparentesco));
		$sql->bindValue(":documentacao", $tmpdocumentacao);
		$sql->bindValue(":ocupacao", utf8_decode($tmpocupacao));
		$sql->bindValue(":remuneracao", $tmpremuneracao);
		$sql->bindValue(":outras_rendas", $tmpoutras_rendas);
		$sql->bindValue(":fk_id", $id);
		$sql->bindValue(":dependente", $tmpdependente);
		return $sql->execute();
	    }
	    if(!isset($tmpdependente) || empty($fk_id)){
	    $sql = $this->pdo->prepare("INSERT INTO dependentes (fk_id, nome, idade, parentesco, documentacao, ocupacao, remuneracao, outras_rendas) VALUES (:fk_id, :nome, :idade, :parentesco, :documentacao, :ocupacao, :remuneracao, :outras_rendas)");
		$sql->bindValue(":nome", utf8_decode($tmpnome));
		$sql->bindValue(":idade", $tmpidade);
		$sql->bindValue(":parentesco", utf8_decode($tmpparentesco));
		$sql->bindValue(":documentacao", $tmpdocumentacao);
		$sql->bindValue(":ocupacao", utf8_decode($tmpocupacao));
		$sql->bindValue(":remuneracao", $tmpremuneracao);
		$sql->bindValue(":outras_rendas", $tmpoutras_rendas);
		$sql->bindValue(":fk_id", $id);
		return $sql->execute();
	    }
	}

	public function excluirDependentes($id){
		$sql = $this->pdo->prepare("DELETE FROM dependentes WHERE dependente = :dependente");
        $sql ->bindValue(":dependente", $id);
        return $sql ->execute();
	}

	public function somarValores(){
		$sql = $this->pdo->prepare("SELECT fk_id, count(fk_id) AS quant, sum(remuneracao) AS remun, sum(outras_rendas) AS rendas FROM dependentes GROUP BY fk_id");
		$sql->execute();
		return $sql->fetchAll();
	}

	public function listaDependentesAll(){
		$sql = $this->pdo->prepare("SELECT * FROM dependentes GROUP BY fk_id");
		$sql->execute();
		return $sql->fetchAll();
	}

}
?>