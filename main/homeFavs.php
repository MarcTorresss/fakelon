<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Fakelon</title>
    <link rel="icon" type="image/x-icon" href="../images/porky.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid" id="menu">
      <a class="navbar-brand" href="#">Fakelon</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./fromFak.html">Crear Fak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./homeFavs.php">Favorits</a>
          </li>
          <li class="nav-item">
          <?php
					if(isset($_COOKIE["GON"])){
						session_name("GON");
						session_start();
						if(isset($_SESSION["username"])){
							
							echo "<a class='nav-link' href='./logout.php' tabindex='-1' aria-disabled='true'>LogOut</a>";
						}else{
							header("Location: ../index.php");
							exit();
						}
					}
					else{
						header("Location: ../index.php");
						exit();
					}
					?>
          </li>
        </ul>
        <form class="d-flex" method="post" action="homeFavs.php">
          <input class="form-control me-2" name="search_text" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" id="bt" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>
  <?php 
    require_once("../plus/bdConexio.php");
    require_once("./fav.php");
    $db = openDB();
    $texto = filter_input(INPUT_POST, 'search_text');
    $sql = 'SELECT * FROM `fak` WHERE fav=1 AND `NomUser` LIKE "%' . $texto . '%"  ORDER BY Data_Publicacio DESC';
    $faks = $db->prepare($sql);
    $faks->execute(array());
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    foreach ($faks as $fak) {
      if (isset($fak['Id'])){
        $id = $fak['Id'];
        $sql = "SELECT COUNT(*) FROM `fak` WHERE idOG=:id";
        $NumRespostes = $db->prepare($sql);
        $NumRespostes->execute(array(':id'=>$id));
        $numColumnas = $NumRespostes->fetchColumn();
        echo '      <div class="col">
        <div class="card shadow-sm"> ';
        if($fak['ImatgeURL']!=NULL){
          echo '<img src="'.$fak['ImatgeURL'].'" width="100%" height="265">';
          echo ' <div class="card-body">
          <h5>#'.$fak['Id'].'&nbsp;&nbsp;&nbsp;&nbsp; @'.$fak['NomUser'].'</h5>
          <p class="card-text">'.$fak['Text'].'</p>
          <div class="justify-content-between align-items-center">
            <div class="btn-group">
              <a href="./fromResponder.php?IdOG='.$fak['Id'].'" class="btn btn-sm btn-outline-secondary">Responder</a>
            </div>';
            }else{
              echo '<div style="position: relative; width: 100%; height: 265px; display: flex; justify-content: center; align-items: center;">
                      <svg style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                        <rect width="100%" height="100%" fill="#ccc" />
                      </svg>
                      <p class="card-text" style="position: relative; z-index: 1; text-align: center;">'.$fak['Text'].'</p>
                    </div>';
              echo ' <div class="card-body">
                      <h5>#'.$fak['Id'].'</h5>
                      <h5>@'.$fak['NomUser'].'</h5>
                      <div class=" justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="./fromResponder.php?IdOG='.$fak['Id'].'" class="btn btn-sm btn-outline-secondary">Responder</a>
                        </div>';
          }
          
        if($numColumnas>0)
        {
          echo '<a href="./homeRespuestas.php?IdOG='.$fak['Id'].'"  class="btn btn-sm btn-outline-secondary">Respostes:'.$numColumnas.'</a>';
        }
        else {
          echo '<button class="btn btn-sm btn-outline-secondary">Respostes:'.$numColumnas.'</button>';
        }
        echo '    <div class="cont">
        <a href="./megusta.php?like='.$fak['Id'].'" width="100%" height="100%">
        <img src="../images/corazon.png" id="like" width="50em" height="50em">
        </a>
        <h4 id="num">'.$fak['likes'].'</h4>
        </div>';
        $isfav = "SELECT fav FROM `fak` WHERE Id = ?";
        $result = $db->prepare($isfav);
        $result->execute(array($id));
        $numColumnas = $result->fetchColumn();
        if($numColumnas == 0){
        echo '    <div class="cont">
        <a href="./fav.php?fav='.$fak['Id'].'" width="100%" height="100%">
        <img src="../images/estrella_negra.png" id="fav" width="40em" height="40em">
        </a>
        </div>';
        }elseif($numColumnas == 1){
        echo '    <div class="cont">
        <a href="./favdesactiva.php?fav='.$fak['Id'].'" width="100%" height="100%">
        <img src="../images/estrella.png" id="fav" width="40em" height="40em">
        </a>
        </div>';
        }
        echo '
          <small class="d-flex text-muted">'.$fak['Data_Publicacio'].'</small>
        </div>
        </div>
      </div>
    </div>';
}
}
echo '</div>';
  ?>
  <!-- FOOTER -->
  <footer class="container">
  </footer>
</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>