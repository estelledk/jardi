<br><br>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">

<!-- index n'est pas au même niveau d'arborescence que les autres views, donc gestion du chemin pour affichage des vues : -->

    <?php
    if ($page == '/index.php')  //si page courante est /index.php ;  avec $page déclaré dans view header1headSession.php
    { ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                                      <!-- mentionsLegales -->
          <li class="nav-item"><a class="nav-link" href="views/mentionsLegales.php">Mentions légales</a></li>

                                      <!-- formulaire -->
          <li class="nav-item"><a class="nav-link" href="views/formulaireClient.php">Formulaire-client</a></li>
        </ul>
      </div>
    <?php
    }  
    else  //si page courante pas /index.php
    { ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                                      <!-- mentionsLegales -->
          <li class="nav-item"><a class="nav-link" href="mentionsLegales.php">Mentions légales</a></li>

                                      <!-- formulaire -->
          <li class="nav-item"><a class="nav-link" href="formulaireClient.php">Formulaire-client</a></li>
        </ul>
      </div>
    <?php
    } ?>

  </nav>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>	