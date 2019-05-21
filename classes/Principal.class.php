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

	public function inserirPrincipal($nome, $sexo, $est_civil, $dt_nasc, $cpf, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ, $rede_eletrica, $rede_agua, $rede_esgoto, $situacao_lote, $qnt_imovel, $id_tipo_cadastro){
        $sql = $this->pdo->prepare("INSERT INTO principal (nome, sexo, est_civil, dt_nasc, cpf, rg, endereco, bairro, zona, telefone, email, naturalidade, tempo, ocupacao, remuneracao, outras_rendas, cadunico, nis, bolsa_familia, bpc, escolaridade, imovel, comodos, aluguel, risco, deficiencia, observ, rede_eletrica, rede_agua, rede_esgoto, situacao_lote, qnt_imovel, id_tipo_cadastro, insercao) VALUES (:nome, :sexo, :est_civil, :dt_nasc, :cpf, :rg, :endereco, :bairro, :zona, :telefone, :email, :naturalidade, :tempo, :ocupacao, :remuneracao, :outras_rendas, :cadunico, :nis, :bolsa_familia, :bpc, :escolaridade, :imovel, :comodos, :aluguel, :risco, :deficiencia, :observ, :rede_eletrica, :rede_agua, :rede_esgoto, :situacao_lote, :qnt_imovel, :id_tipo_cadastro, now())");

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
        $sql ->bindValue(":rede_eletrica", utf8_decode($rede_eletrica));
        $sql ->bindValue(":rede_agua", utf8_decode($rede_agua));
        $sql ->bindValue(":rede_esgoto", utf8_decode($rede_esgoto));
        $sql ->bindValue(":situacao_lote", utf8_decode($situacao_lote));
        $sql ->bindValue(":qnt_imovel", utf8_decode($qnt_imovel));
        $sql ->bindValue(":id_tipo_cadastro", utf8_decode($id_tipo_cadastro));
        $sql->execute();
	}

        public function updatePrincipal($id, $nome, $sexo, $est_civil, $dt_nasc, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ, $rede_eletrica, $rede_agua, $rede_esgoto, $situacao_lote, $qnt_imovel, $id_tipo_cadastro){
        $sql = $this->pdo->prepare("UPDATE principal SET 
                nome = :nome, sexo = :sexo, est_civil = :est_civil, dt_nasc = :dt_nasc, rg = :rg, 
                endereco = :endereco, bairro = :bairro, zona = :zona, email = :email, telefone = :telefone,
                naturalidade = :naturalidade, tempo = :tempo, remuneracao = :remuneracao, outras_rendas = :outras_rendas, cadunico = :cadunico, nis = :nis, 
                bolsa_familia = :bolsa_familia, bpc = :bpc, escolaridade = :escolaridade, 
                imovel = :imovel, comodos = :comodos, aluguel = :aluguel, risco = :risco, rede_eletrica = :rede_eletrica, rede_agua = :rede_agua, rede_esgoto = :rede_esgoto, situacao_lote = :situacao_lote, qnt_imovel = :qnt_imovel, deficiencia = :deficiencia, observ = :observ, ocupacao = :ocupacao,  id_tipo_cadastro = :id_tipo_cadastro, atualizacao = now() WHERE id = :id");
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
        $sql ->bindValue(":rede_eletrica", $rede_eletrica);
        $sql ->bindValue(":rede_agua", $rede_agua);
        $sql ->bindValue(":rede_esgoto", $rede_esgoto);
        $sql ->bindValue(":situacao_lote", $situacao_lote);
        $sql ->bindValue(":qnt_imovel", $qnt_imovel);
        $sql ->bindValue(":id_tipo_cadastro", $id_tipo_cadastro);
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

        public function listaQntProgramas(){
            $sql = $this->pdo->prepare("SELECT (SELECT count(id) FROM principal WHERE id_tipo_cadastro = '2') as tppme, (SELECT count(id) FROM principal WHERE id_tipo_cadastro = '1') as tmcmv FROM principal");
            $sql->execute();
            return $sql->fetch();
        }

        public function listaFiltro($nome, $est_civil, $dt_nasc, $dt_nasc_final, $cpf, $rg, $endereco, $bairro, $zona, $escolaridade, $deficiencia, $bolsa_familia, $bpc, $cadunico, $nis, $sexo, $tipoformulario, $rede_eletrica, $rede_esgoto, $rede_agua, $situacao_lote, $qnt_imovel) 
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

                if (!empty($endereco)) {
                        $filtrostring[] = ' endereco LIKE :endereco';
                }

                if (!empty($bairro)) {
                        $filtrostring[] = ' bairro = :bairro';
                }

                if (!empty($zona)) {
                        $filtrostring[] = ' zona = :zona';
                }

                if (!empty($deficiencia)) {
                        $filtrostring[] = ' deficiencia = :deficiencia';
                }

                if (!empty($escolaridade)) {
                        $filtrostring[] = ' escolaridade = :escolaridade';
                }

                if (!empty($bolsa_familia) || $bolsa_familia == '0') {
                        $filtrostring[] = ' bolsa_familia = :bolsa_familia';
                }

                if (!empty($bpc) || $bpc == '0') {
                        $filtrostring[] = ' bpc = :bpc';
                }

                if (!empty($cadunico) || $cadunico == '0') {
                        $filtrostring[] = ' cadunico = :cadunico';
                }

                if (!empty($nis)) {
                        $filtrostring[] = ' nis = :nis';
                }
                
                if (!empty($sexo) || $sexo == '0') {
                        $filtrostring[] = ' sexo = :sexo';
                }

                if (!empty($tipoformulario)) {
                        $filtrostring[] = ' id_tipo_cadastro = :tipoformulario';
                }

                if (!empty($rede_eletrica) || $rede_eletrica == '0') {
                    $filtrostring[] = ' rede_eletrica = :rede_eletrica';
                }

                if (!empty($rede_esgoto) || $rede_esgoto  == '0') {
                    $filtrostring[] = ' rede_esgoto = :rede_esgoto';
                }

                if (!empty($rede_agua) || $rede_agua  == '0') {
                    $filtrostring[] = ' rede_agua = :rede_agua';
                }

                if (!empty($situacao_lote) || $situacao_lote  == '0') {
                    $filtrostring[] = ' situacao_lote = :situacao_lote';
                }

                if (!empty($qnt_imovel)) {
                    $filtrostring[] = ' qnt_imovel = :qnt_imovel';
                }

                if (!empty($nome) || !empty($est_civil) || !empty($dt_nasc) || !empty($cpf) || 
                    !empty($rg) || !empty($endereco) || !empty($bairro) || !empty($zona) || 
                    !empty($deficiencia) || !empty($escolaridade) || 
                    !empty($bolsa_familia) || $bolsa_familia == '0' || !empty($bpc) || $bpc == '0' ||
                    !empty($cadunico) || $cadunico == '0' || !empty($nis) || !empty($sexo) || $sexo == '0' || 
                    !empty($tipoformulario) || !empty($rede_eletrica) || $rede_eletrica == '0'  || 
                    !empty($rede_esgoto) || $rede_esgoto == '0' || !empty($rede_agua) || $rede_agua == '0' || 
                    !empty($situacao_lote) || $situacao_lote == '0' || !empty($qnt_imovel)) {
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

                if (!empty($endereco)) {
                        $sql->bindValue(":endereco", '%'.utf8_decode($endereco).'%');
                }

                if (!empty($bairro)) {
                        $sql->bindValue(":bairro", $bairro);
                }

                if (!empty($zona)) {
                        $sql->bindValue(":zona", $zona);
                }

                if (!empty($escolaridade)) {
                        $sql->bindValue(":escolaridade", $escolaridade);
                }

                if (!empty($deficiencia)) {
                        $sql->bindValue(":deficiencia", utf8_decode($deficiencia));
                }

                if (!empty($bolsa_familia) || $bolsa_familia == '0') {
                        $sql->bindValue(":bolsa_familia", $bolsa_familia);
                }

                if (!empty($bpc) || $bpc == '0') {
                        $sql->bindValue(":bpc", $bpc);
                }

                if (!empty($cadunico) || $cadunico == '0') {
                        $sql->bindValue(":cadunico", $cadunico);
                }

                if (!empty($nis)) {
                        $sql->bindValue(":nis", $nis);
                }

                if (!empty($sexo) || $sexo == '0') {
                        $sql->bindValue(":sexo", $sexo);
                }

                if (!empty($tipoformulario)) {
                        $sql->bindValue(":tipoformulario", $tipoformulario);
                }

                if (!empty($rede_eletrica) || $rede_eletrica == '0') {
                        $sql->bindValue(":rede_eletrica", $rede_eletrica);
                }
                if (!empty($rede_esgoto) || $rede_esgoto == '0') {
                        $sql->bindValue(":rede_esgoto", $rede_esgoto);
                }
                if (!empty($rede_agua) || $rede_agua == '0') {
                        $sql->bindValue(":rede_agua", $rede_agua);
                }
                if (!empty($situacao_lote) || $situacao_lote == '0') {
                        $sql->bindValue(":situacao_lote", $situacao_lote);
                }
                if (!empty($qnt_imovel)) {
                        $sql->bindValue(":qnt_imovel", $qnt_imovel);
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

        function insertImage($id_principal)
        {
          for ($i=0; $i < count($_FILES['myfile']['name']); $i++) { 
                $name = $_FILES['myfile']['name'][$i];
                $type = $_FILES['myfile']['type'][$i];
                $data = file_get_contents($_FILES['myfile']['tmp_name'][$i]);
                $sql = $this->pdo->prepare('INSERT INTO image_blobs (imageType, imageData, name, principal_id) VALUES (:imageType, :imageData, :name, :principal_id)');
                $sql ->bindValue(':imageType', $type);
                $sql ->bindValue(':imageData', $data);
                $sql ->bindValue(':name', $name);
                $sql ->bindValue(':principal_id', $id_principal);
                $sql ->execute();
            }
        }

        function listaImagem($principal_id){
            $sql = $this->pdo->prepare('SELECT * FROM image_blobs WHERE principal_id = :principal_id');
            $sql ->bindValue(":principal_id", $principal_id);
            $sql ->execute();
            return $sql->fetchAll();
        }

        public function excluirImagem($id_imagem)
        {
            $sql = $this->pdo->prepare("DELETE FROM image_blobs WHERE id = :id_imagem");
            $sql ->bindValue(":id_imagem", $id_imagem);
            $sql ->execute();
        }

}
?>