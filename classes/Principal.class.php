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
        $sql = $this->pdo->prepare("INSERT INTO principal (nome, sexo, est_civil, dt_nasc, cpf, rg, endereco, bairro, zona, telefone, email, naturalidade, tempo, ocupacao, remuneracao, outras_rendas, cadunico, nis, bolsa_familia, bpc, escolaridade, imovel, comodos, aluguel, risco, deficiencia, observ, insercao) VALUES (:nome, :sexo, :est_civil, :dt_nasc, :cpf, :rg, :endereco, :bairro, :zona, :telefone, :email, :naturalidade, :tempo, :ocupacao, :remuneracao, :outras_rendas, :cadunico, :nis, :bolsa_familia, :bpc, :escolaridade, :imovel, :comodos, :aluguel, :risco, :deficiencia, :observ, now())");
        $sql ->bindValue(":nome", utf8_decode($nome));
        $sql ->bindValue(":sexo", utf8_decode($sexo));
        $sql ->bindValue(":est_civil", utf8_decode($est_civil));
        $sql ->bindValue(":dt_nasc", date('Y-m-d', strtotime($dt_nasc)));
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
                deficiencia = :deficiencia, observ = :observ, ocupacao = :ocupacao, atualizacao = now() WHERE id = :id");
        $sql ->bindValue(":nome", utf8_decode($nome));
        $sql ->bindValue(":sexo", utf8_decode($sexo));
        $sql ->bindValue(":est_civil", utf8_decode($est_civil));
        $sql ->bindValue(":dt_nasc", date('Y-m-d', strtotime($dt_nasc)));
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

        public function listaAllPrincipalPage($p, $qntpg){
        $sql = $this->pdo->prepare("SELECT id, nome, cpf From principal ORDER BY id desc LIMIT $p, $qntpg");
        $sql ->execute();
        return $sql->fetchAll();
        }
        public function countPrincipal(){
        $sql = $this->pdo->prepare("SELECT count(id) as total FROM principal");
        $sql->execute();
        return $sql->fetch();
        }

        public function listaFiltro($nome, $est_civil, $dt_nasc, $dt_nasc_final, $cpf, $rg) 
        {       
                $filtrostring = array();
                if (!empty($nome)) {
                        $filtrostring[] = ' nome LIKE :nome';
                }

                if (!empty($est_civil)) {
                        $filtrostring[] = ' est_civil = :est_civil';
                }
                
                if (!empty($dt_nasc) && !empty($dt_nasc_final)) {
                        $filtrostring[] = ' dt_nasc BETWEEN :dt_nasc AND :dt_nasc_final';
                }

                if (!empty($cpf)) {
                        $filtrostring[] = ' cpf = :cpf';
                }

                if (!empty($rg)) {
                        $filtrostring[] = ' rg = :rg';
                }

                if (!empty($nome) || !empty($est_civil) || !empty($dt_nasc) || !empty($cpf) || !empty($rg)) {
                        $sql = $this->pdo->prepare("SELECT * FROM principal WHERE".implode(' AND ', $filtrostring)); 
                }else{
                       $sql = $this->pdo->prepare("SELECT * FROM principal ORDER BY id DESC LIMIT 10"); 
                }
                

                if (!empty($est_civil)) {
                        $sql->bindValue(":est_civil", $est_civil);
                }
                if (!empty($nome)) {
                        $sql->bindValue(":nome", "%".$nome."%");
                }
                
                if (!empty($dt_nasc) && !empty($dt_nasc_final)) {
                        $dt_nasc        = date('Y-m-d', strtotime($dt_nasc));
                        $dt_nasc_final  = date('Y-m-d', strtotime($dt_nasc_final));
                        $sql->bindValue(":dt_nasc", $dt_nasc);
                        $sql->bindValue(":dt_nasc_final", $dt_nasc_final);
                }

                if (!empty($cpf)) {
                        $sql->bindValue(":cpf", $cpf);
                }

                if (!empty($rg)) {
                        $sql->bindValue(":rg", $rg);
                }

                $sql->execute();
                return $sql->fetchAll();
        }

        function buscaData(){
                $sql = $this->pdo->prepare("SELECT id, dt_nasc FROM principal WHERE dt_nasc LIKE '%/%'");
                $sql->execute();
                return $sql->fetchAll();
        }

        function converteData($id, $nova_data){
                $sql = $this->pdo->prepare("UPDATE principal SET dt_nasc = :dt_nasc WHERE id = :id");
                $sql->bindValue(":dt_nasc", $nova_data);
                $sql->bindValue(":id", $id);
                $sql->execute();
        }

}
?>