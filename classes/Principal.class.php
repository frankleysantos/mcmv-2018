<?php  
/**
* 
*/
class Principal
{
	 private $pdo;

	 public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function inserirPrincipal($nome, $sexo, $est_civil, $dt_nasc, $cpf, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ){
        $sql = $this->pdo->prepare("INSERT INTO principal (nome, sexo, est_civil, dt_nasc, cpf, rg, endereco, bairro, zona, telefone, email, naturalidade, tempo, ocupacao, remuneracao, outras_rendas, cadunico, nis, bolsa_familia, bpc, escolaridade, imovel, comodos, aluguel, risco, deficiencia, observ) VALUES (:nome, :sexo, :est_civil, :dt_nasc, :cpf, :rg, :endereco, :bairro, :zona, :telefone, :email, :naturalidade, :tempo, :ocupacao, :remuneracao, :outras_rendas, :cadunico, :nis, :bolsa_familia, :bpc, :escolaridade, :imovel, :comodos, :aluguel, :risco, :deficiencia, :observ)");
        $sql ->bindValue(":nome", utf8_decode($nome));
        $sql ->bindValue(":sexo", utf8_decode($sexo));
        $sql ->bindValue(":est_civil", utf8_decode($est_civil));
        $sql ->bindValue(":dt_nasc", utf8_decode($dt_nasc));
        $sql ->bindValue(":cpf", utf8_decode($cpf));
        $sql ->bindValue(":rg", utf8_decode($rg));
        $sql ->bindValue(":endereco", utf8_decode($endereco)); 
        $sql ->bindValue(":bairro", utf8_decode($bairro)); 
        $sql ->bindValue(":zona", utf8_decode($zona));
        $sql ->bindValue(":telefone", utf8_decode($telefone));
        $sql ->bindValue(":email", utf8_decode($email));
        $sql ->bindValue(":naturalidade", utf8_decode($naturalidade));
        $sql ->bindValue(":tempo", utf8_decode($tempo));
        $sql ->bindValue(":ocupacao", utf8_decode($ocupacao));
        $sql ->bindValue(":remuneracao", utf8_decode($remuneracao));
        $sql ->bindValue(":outras_rendas", utf8_decode($outras_rendas));
        $sql ->bindValue(":cadunico", utf8_decode($cadunico));
        $sql ->bindValue(":nis", utf8_decode($nis)); 
        $sql ->bindValue(":bolsa_familia", utf8_decode($bolsa_familia)); 
        $sql ->bindValue(":bpc", utf8_decode($bpc));
        $sql ->bindValue(":escolaridade", utf8_decode($escolaridade)); 
        $sql ->bindValue(":imovel", utf8_decode($imovel));
        $sql ->bindValue(":comodos", utf8_decode($comodos)); 
        $sql ->bindValue(":aluguel", utf8_decode($aluguel));
        $sql ->bindValue(":risco", utf8_decode($risco));
        $sql ->bindValue(":deficiencia", utf8_decode($deficiencia)); 
        $sql ->bindValue(":observ", utf8_decode($observ));
        return $sql->execute();
	}

        public function updatePrincipal($id, $nome, $sexo, $est_civil, $dt_nasc, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ){
        $sql = $this->pdo->prepare("UPDATE principal SET 
                nome = :nome, sexo = :sexo, est_civil = :est_civil, dt_nasc = :dt_nasc, rg = :rg, 
                endereco = :endereco, bairro = :bairro, zona = :zona, email = :email, telefone = :telefone,
                naturalidade = :naturalidade, tempo = :tempo, remuneracao = :remuneracao, outras_rendas = :outras_rendas, cadunico = :cadunico, nis = :nis, 
                bolsa_familia = :bolsa_familia, bpc = :bpc, escolaridade = :escolaridade, 
                imovel = :imovel, comodos = :comodos, aluguel = :aluguel, risco = :risco, 
                deficiencia = :deficiencia, observ = :observ, ocupacao = :ocupacao WHERE id = :id");
        $sql ->bindValue(":nome", utf8_decode($nome));
        $sql ->bindValue(":sexo", utf8_decode($sexo));
        $sql ->bindValue(":est_civil", utf8_decode($est_civil));
        $sql ->bindValue(":dt_nasc", utf8_decode($dt_nasc));
        $sql ->bindValue(":rg", utf8_decode($rg));
        $sql ->bindValue(":endereco", utf8_decode($endereco));
        $sql ->bindValue(":bairro", utf8_decode($bairro));
        $sql ->bindValue(":zona", utf8_decode($zona));
        $sql ->bindValue(":email", utf8_decode($email));
        $sql ->bindValue(":telefone", utf8_decode($telefone));
        $sql ->bindValue(":naturalidade", utf8_decode($naturalidade));
        $sql ->bindValue(":tempo", utf8_decode($tempo));
        $sql ->bindValue(":ocupacao", utf8_decode($ocupacao));
        $sql ->bindValue(":remuneracao", utf8_decode($remuneracao));
        $sql ->bindValue(":outras_rendas", utf8_decode($outras_rendas));
        $sql ->bindValue(":cadunico", utf8_decode($cadunico));
        $sql ->bindValue(":nis", utf8_decode($nis));
        $sql ->bindValue(":bolsa_familia", utf8_decode($bolsa_familia));
        $sql ->bindValue(":bpc", utf8_decode($bpc));
        $sql ->bindValue(":escolaridade", utf8_decode($escolaridade));
        $sql ->bindValue(":imovel", utf8_decode($imovel));
        $sql ->bindValue(":comodos", utf8_decode($comodos));
        $sql ->bindValue(":aluguel", utf8_decode($aluguel));
        $sql ->bindValue(":risco", utf8_decode($risco));
        $sql ->bindValue(":deficiencia", utf8_decode($deficiencia));
        $sql ->bindValue(":observ", utf8_decode($observ));
        $sql ->bindValue(":id", $id);
        return $sql->execute();
        }

        public function listaPrincipal($cpf){
        $sql = $this->pdo->prepare("SELECT * FROM principal WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        return $sql->fetch();
        }

        public function listaAllPrincipal(){
        $sql = $this->pdo->prepare("SELECT id, nome, sexo, est_civil, dt_nasc, cpf, rg, endereco, bairro, zona, telefone, email, naturalidade, tempo, ocupacao, remuneracao, outras_rendas, cadunico, nis, bolsa_familia, bpc, escolaridade, imovel, comodos, aluguel, risco, deficiencia From principal");
        $sql ->execute();
        return $sql->fetchAll();
        }

}
?>