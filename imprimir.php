<!DOCTYPE html>
<?php 
session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<html>
<head>
  <title>PMTO</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="resources/css/bootstrap.min.css">
  <link href="resources/css/print.css" rel="stylesheet" media="print">
</head>
<body>
  <h4 align="center"><img src="resources/images/brasao.png" width="30px">PREFEITURA MUNICIPAL DE TEÓFILO OTONI<br>SECRETARIA MUNICIPAL DE ASSISTÊNCIA SOCIAL E HABITAÇÃO<br>CADASTRO GERAL DE HABITAÇÃO</h4>
  <div class="container">
  <table class="table table-striped table-bordered">
  <tbody>
    <tr>
      <td><b>Nome:</b> <?=$_SESSION['PRINCIPAL']['nome'];?></td>
      <td><b>Sexo:</b>
        <?php if($_SESSION['PRINCIPAL']['sexo'] == '0'):?>
          Masculino
        <?php else: ?>
          Feminino
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td><b>Data de Nascimento:</b> <?=$_SESSION['PRINCIPAL']['dt_nasc'];?></td>
      <td><b>Estado Civil:</b> <?=$_SESSION['PRINCIPAL']['est_civil'];?></td>
    </tr>
    <tr>
      <td><b>Email:</b> <?=$_SESSION['PRINCIPAL']['email'];?></td>
      <td><b>Telefone:</b> <?=$_SESSION['PRINCIPAL']['telefone'];?></td>
    </tr>
    <tr>
      <td><b>CPF:</b> <?=$_SESSION['PRINCIPAL']['cpf'];?></td>
      <td><b>RG:</b> <?=$_SESSION['PRINCIPAL']['rg'];?></td>
    </tr>
    <tr>
      <td colspan="2"><b>Endereço:</b> <?=$_SESSION['PRINCIPAL']['endereco'];?></td>
    </tr>
    <tr>
      <td><b>Bairro:</b> <?=$_SESSION['PRINCIPAL']['bairro'];?></td>
      <td><b>Zona:</b>
        <?php if($_SESSION['PRINCIPAL']['zona'] == '0'):;?>
          Urbana
        <?php else: ?>
          Rural
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td><b>Naturalidade:</b> <?=$_SESSION['PRINCIPAL']['naturalidade'];?></td>
      <td><b>Tempo de Moradia:</b> <?=$_SESSION['PRINCIPAL']['tempo'];?> anos</td>
    </tr>
    <tr>
      <td><b>Ocupação:</b> <?=$_SESSION['PRINCIPAL']['ocupacao'];?></td>
      <td><b>Remuneração:</b> R$<?=$_SESSION['PRINCIPAL']['remuneracao'];?></td>
    </tr>
    <tr>
      <td><b>Outras Rendas:</b> R$<?=$_SESSION['PRINCIPAL']['outras_rendas'];?></td>
      <td><b>NÍVEL DE ESCOLARIDADE:</b> <?=utf8_encode($_SESSION['PRINCIPAL']['escolaridade']);?></td>
    </tr>
    <tr>
      <td><b>CadÚnico:</b> 
        <?php if($_SESSION['PRINCIPAL']['cadunico'] == '0'):?>
        Sim
        <?php else: ?>
        Não
        <?php endif; ?>       
      </td>
      <td><b>NIS:</b> <?=$_SESSION['PRINCIPAL']['nis'];?></td>
    </tr>
    <tr>
      <td><b>Bolsa Família:</b> 
        <?php if($_SESSION['PRINCIPAL']['bolsa_familia'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['bolsa_familia'] == '1'):?>
              Não
        <?php endif; ?>
      </td>
      <td><b>BPC:</b> 
        <?php if($_SESSION['PRINCIPAL']['bpc'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['bpc'] == '1'):?>
              Não
        <?php endif; ?>
        </td>
    </tr>
    <tr>
      <td><b>Situação do Imóvel:</b> <?=utf8_encode($_SESSION['PRINCIPAL']['imovel']);?></td>
      <td><b>Quantidade de Cômodos:</b> <?=$_SESSION['PRINCIPAL']['comodos'];?></td>
    </tr>
    <tr>
      <td><b>Aluguel:</b> R$<?=$_SESSION['PRINCIPAL']['aluguel'];?></td>
      <td><b>Área de Risco:</b>
        <?php if($_SESSION['PRINCIPAL']['risco'] == '0'):?>
              Sim
        <?php endif; ?>
        <?php if($_SESSION['PRINCIPAL']['risco'] == '1'):?>
              Não
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td colspan="2"><b>Deficiência Encontrada em Membro da Familia:</b> <?=utf8_encode($_SESSION['PRINCIPAL']['deficiencia']);?></td>
    </tr>
    <tr>
      <td colspan="2">
        <label><b>Observação:</b></label>
        <textarea name="" id="input" class="form-control" rows="2" required="required" disabled>
  <?=$_SESSION['PRINCIPAL']['observ']; ?></textarea></td>
    </tr>
  </tbody>
</table>
          <?php if(isset($_SESSION['DEPENDENTE']['contador']) && !empty($_SESSION['DEPENDENTE']['contador'])): ?>
          <?php $contador = $_SESSION['DEPENDENTE']['contador'];?>
          <?php else: ?>
          <?php $contador = 0; ?>
          <?php endif; ?>
          <table class='table table-striped table-bordered'>
            <thead>
              <tr>
                <th colspan="7" align="center">Composição familiar</th>
              </div>
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
          <p align="justify">Declaro, sob as penas da lei (Art. 299 do Código Penal), que as declarações contidas neste formulário correspondem à verdade e comprometo-me a procurar a Secretaria Municipal de Assistência Social e Habitação para atualizá-las sempre que houver mudanças em relação às informações prestadas por mim nesta entrevista ou, no máximo, em até dois anos da data desta entrevista. <b>Teófilo Otoni, <?php echo strftime('%d de %B de %Y', strtotime('today'));?></b></p>
          <p align="center">___________________________________________________________</p>
          <p align="center">Assinatura do Responsável pela Unidade Familiar</p>
          <hr>
          <p align="center"><img src="resources/images/brasao.png" width="30px">PREFEITURA MUNICIPAL DE TEÓFILO OTONI</p>
          <p align="center">SECRETARIA MUNICIPAL DE ASSISTÊNCIA SOCIAL E HABITAÇÃO</p>
          <p align="center">CADASTRO GERAL DE HABITAÇÃO</p>
          
          <table class="table table-striped">
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
          <div class="hidden-print">
            <p>
             <a href="#" onclick="window.print()" class="btn btn-warning fas fa-print">Imprimir</a>
             <a href="index.php" class="btn btn-info fas fa-back">Voltar</a>
           </p>
         </div>
       </div>
       <!-- jQuery -->
       <script src="//code.jquery.com/jquery.js"></script>
       <!-- Bootstrap JavaScript -->
       <script src="functions.js"></script>
       <script src="resources/js/bootstrap.min.js"></script>
       <script src="resources/js/bootstrap.bundle.js"></script>
     </body>
     </html>