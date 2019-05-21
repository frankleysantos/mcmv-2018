<?php
session_start();
ob_start();
?>

<h4 align="center"><img src="resources/images/brasao.png" width="30px">PREFEITURA MUNICIPAL DE TEÓFILO OTONI<br>SECRETARIA MUNICIPAL DE ASSISTÊNCIA SOCIAL E HABITAÇÃO<br>CADASTRO GERAL DE HABITAÇÃO</h4>
<table class="table table-bordered">
  <tbody>
    <tr>
      <td><b>NOME:</b> <?=$_SESSION['PRINCIPAL']['nome'];?></td>
      <td>SEXO:
        <?php if($_SESSION['PRINCIPAL']['sexo'] == '0'):?>
          Masculino
        <?php else: ?>
          Feminino
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>DATA DE NASCIMENTO: <?=$_SESSION['PRINCIPAL']['dt_nasc'];?></td>
      <td>ESTADO CIVIL: <?=$_SESSION['PRINCIPAL']['est_civil'];?></td>
    </tr>
    <tr>
      <td>EMAIL: <?=$_SESSION['PRINCIPAL']['email'];?></td>
      <td>Telefone: <?=$_SESSION['PRINCIPAL']['telefone'];?></td>
    </tr>
    <tr>
      <td>CPF: <?=$_SESSION['PRINCIPAL']['cpf'];?></td>
      <td>RG: <?=$_SESSION['PRINCIPAL']['rg'];?></td>
    </tr>
    <tr>
      <td>ENDEREÇO: <?=$_SESSION['PRINCIPAL']['endereco'];?></td>
    </tr>
    <tr>
      <td>BAIRRO: <?=$_SESSION['PRINCIPAL']['bairro'];?></td>
      <td>ZONA:
        <?php if($_SESSION['PRINCIPAL']['zona'] == '0'):;?>
          Urbana
        <?php else: ?>
          Rural
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>NATURALIDADE: <?=$_SESSION['PRINCIPAL']['naturalidade'];?></td>
      <td>TEMPO DE MORADIA: <?=$_SESSION['PRINCIPAL']['tempo'];?> anos</td>
    </tr>
    <tr>
      <td>OCUPAÇÃO: <?=$_SESSION['PRINCIPAL']['ocupacao'];?></td>
      <td>REMUNERAÇÃO: R$<?=$_SESSION['PRINCIPAL']['remuneracao'];?></td>
    </tr>
    <tr>
      <td>OUTRAS RENDAS: R$<?=$_SESSION['PRINCIPAL']['outras_rendas'];?></td>
      <td>NÍVEL DE ESCOLARIDADE: <?=$_SESSION['PRINCIPAL']['escolaridade'];?></td>
    </tr>
    <tr>
      <td>CADÚNICO: 
        <?php if($_SESSION['PRINCIPAL']['cadunico'] == '0'):?>
        Sim
        <?php else: ?>
        Não
        <?php endif; ?>       
      </td>
      <td>NIS: <?=$_SESSION['PRINCIPAL']['nis'];?></td>
    </tr>
    <tr>
      <td>BOLSA FAMÍLIA: 
        <?php if($_SESSION['PRINCIPAL']['bolsa_familia'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['bolsa_familia'] == '1'):?>
              Não
        <?php endif; ?>
      </td>
      <td>BPC: 
        <?php if($_SESSION['PRINCIPAL']['bpc'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['bpc'] == '1'):?>
              Não
        <?php endif; ?>
        </td>
    </tr>
    <tr>
      <td>SITUAÇÃO DO IMÓVEL: <?=$_SESSION['PRINCIPAL']['imovel'];?></td>
      <td>QUANTIDADE DE CÔMODOS: <?=$_SESSION['PRINCIPAL']['comodos'];?></td>
    </tr>
    <tr>
      <td>ALUGUEL: R$<?=$_SESSION['PRINCIPAL']['aluguel'];?></td>
      <td>ÁREA DE RISCO:
        <?php if($_SESSION['PRINCIPAL']['risco'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['risco'] == '1'):?>
              Não
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td>DEFICIÊNCIA ENCONTRADA EM MEMBRO DA FAMÍLIA: <?=$_SESSION['PRINCIPAL']['deficiencia'];?></td>
    </tr>
  </tbody>
</table>
OBSERVAÇÃO:
<textarea name="" id="input" class="form-control" rows="3" required="required">
  <?=$_SESSION['PRINCIPAL']['observ']; ?></textarea>
<?php $contador = $_SESSION['DEPENDENTE']['contador'];?>
<table class='table table-bordered'>
  <thead>
    <tr>
      <th colspan="7" align="center">Composição familiar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center">Nome</td>
      <td align="center">Idade</td>
      <td align="center">Parentesco</td>
      <td align="center">Documento</td>
      <td align="center">Ocupacao</td>
      <td align="center">Remuneração</td>
      <td align="center">Outras Rendas</td>
    </tr>
    <?php 
    for ($i=1; $i <= $contador ; $i++){
    ?>  
    <tr>
      <td><?php echo $_SESSION['DEPENDENTE']['nome'.$i]?></td>
      <td><?php echo $_SESSION['DEPENDENTE']['idade'.$i]?></td>
      <td><?php echo $_SESSION['DEPENDENTE']['parentesco'.$i]?></td>
      <td><?php echo $_SESSION['DEPENDENTE']['documentacao'.$i]?></td>
      <td><?php echo $_SESSION['DEPENDENTE']['ocupacao'.$i]?></td>
      <td><?php echo "R$".$_SESSION['DEPENDENTE']['remuneracao'.$i]?></td>
      <td><?php echo "R$".$_SESSION['DEPENDENTE']['outras_rendas'.$i]?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<p align="justify">Declaro, sob as penas da lei (Art. 299 do Código Penal), que as declarações contidas neste formulário correspondem à verdade e comprometo-me a procurar a Secretaria Municipal de Assistência Social e Habitação para atualizá-las sempre que houver mudanças em relação às informações prestadas por mim nesta entrevista ou, no máximo, em até dois anos da data desta entrevista.</p>
<p align="center">___________________________________________________________</p>
<p align="center">Assinatura do Responsável pela Unidade Familiar</p>
<hr>
<p align="center"><img src="resources/images/brasao.png" width="30px">PREFEITURA MUNICIPAL DE TEÓFILO OTONI</p>
<p align="center">SECRETARIA MUNICIPAL DE ASSISTÊNCIA SOCIAL E HABITAÇÃO</p>
<p align="center">CADASTRO GERAL DE HABITAÇÃO</p>
<?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
           date_default_timezone_set('America/Sao_Paulo');
           ?>
<table class="table table-hover">
  <tbody>
    <tr>
      <td>Nome:<?=$_SESSION['PRINCIPAL']['nome'];?></td>
      <td align="right">CPF:<?=$_SESSION['PRINCIPAL']['cpf'];?></td>
    </tr>
    <tr>
      <td></td>
      <td align="right">CADASTRO PENDENTE:[&ensp;]SIM [&ensp;]NÃO</td>
    </tr>
  </tbody>
</table>
           <p align="center">Teófilo Otoni <?php echo strftime('%d de %B de %Y', strtotime('today'));?></p>
           <p align="center">___________________________________________________________</p>
           <p align="center">Entrevistador</p>
<?php
$html = ob_get_contents();
ob_end_clean();
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(); 
$stylesheet = file_get_contents('bootstrap.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html);

$mpdf->Output("arquivo.pdf", "I");

?>