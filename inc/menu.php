<nav class="navbar navbar-expand-lg navbar-dark bg-info navmeu">
  <a class="navbar-brand" href="index.php"><label class="fas fa-home">Home</label></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><label class="fas fa-file-alt">Cadastrar</label></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="consulta_principal.php"><label class="fas fa-file-pdf">Consulta</label></a>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <label class="fas fa-users">Relatórios Excel</label>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item fas fa-file-pdf" href="excel_principal.php">Principal</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item fas fa-file-alt" href="excel_dependente.php">Dependentes</a>
        </div>
      </li>
    </ul>
  </div>
</nav>