<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">    <img  class ="w-25 " src="img/2.png" style="max-width: 350px;" class="rounded mx-auto d-block" alt="...">
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="index.php">Les Oeuvres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publishOeuvre.php">Publier une Oeuvre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myOeuvrepublish.php">Mes Oeuvres</a>
        </li>
          <?php 
          if(isset($_SESSION['auth'] ) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superadmin')){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="backoffice.php">Back office</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
            </li>




            <?php
          }
        ?>




      </ul>
    </div>
  </div>
</nav>