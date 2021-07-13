<?php require_once "validador_acesso.php"; ?>

<?php 

      $chamados = array();

      $arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');
      
      while(!feof($arquivo)) {
        $registro = fgets($arquivo);
        $chamados[] = $registro;
      }

      fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item" style="color: #FFF; position: absolute; right: 65px; top: 16px" > <i class="fas fa-user-tie" style="margin-right: 5px;"></i> <?php echo $_SESSION['nome']; ?></li>
      </ul>

      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

            <?php foreach($chamados as $chamado) { ?>   
              
              <?php 
                
                $chamado_dados = explode('#', $chamado);

                if($_SESSION['perfil_id'] == 2) {

                  if($_SESSION['id'] != $chamado_dados[0]) {
                    continue;
                  }
                }

                if(count($chamado_dados) < 3) {
                  continue;
                } 
                
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>
                </div>
              </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>