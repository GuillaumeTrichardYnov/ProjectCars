<?php
require_once 'header.php';
?>
<?php
    $error = "null";

    if(isset($_POST['temp']) && !empty($_POST['temp']) && isset($_POST['pilote'])&& !empty($_POST['pilote']) && isset($_POST['voiture'])&& !empty($_POST['voiture'])&& isset($_POST['circuit'])&& !empty($_POST['circuit']))
    {
        try 
        {
            $temps->AjoutTemp($_POST['temp'], $_POST['pilote'], $_POST['circuit'], $_POST['voiture']);
             header('Location: index.php');
            die();
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
    }
    else
    {
        if(isset($_POST['ok']))
        {
            $error = "champs mal remplis";
        }
    }
?>    


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project Cars</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li data-toggle="modal" data-target="#exampleModalLong"><a href="#">Ajouter</a></li>
              <li data-toggle="modal" data-target="#exampleModalLong2"><a href="#">Chercher</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
<br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Tout les temps</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Temp</th>
                    <th>Pilote</th>
                    <th>Voiture</th>
                    <th>Circuit</th>
                </tr>
              </thead>
                <tbody>
                    
                    <?php if(isset($_GET['voiture']) || !empty($_GET['voiture']) || isset($_GET['pilote']) || !empty($_GET['pilote']) || isset($_GET['circuit']) || !empty($_GET['circuit'])) {
                        
                     $Lestemps = $temps->SearchTemps($_GET['voiture'], $_GET['pilote'], $_GET['circuit']);foreach($Lestemps as $temp):   ?>
                        <tr>
                            <td> <?php echo $temp->Temp; ?></td>
                            <td> <?php $add = $pilotes->GetPiloteById($temp->FKPilote); echo $add->Nom; echo $add->Prenom; ?></td>
                            <td> <?php $add = $voitures->GetVoitureById($temp->FKVoiture); echo $add->Nom; ?></td>
                            <td> <?php $add = $circuits->GetCircuitById($temp->FKCircuit); echo $add->Nom; ?></td>
                        </tr>
                    <?php endforeach;
                    }
                    else
                    {
                    ?>
                    
                    <?php $Lestemps = $temps->GetAllTemps();foreach($Lestemps as $temp):   ?>
                        <tr>
                            <td> <?php echo $temp->Temp; ?></td>
                            <td> <?php $add = $pilotes->GetPiloteById($temp->FKPilote); echo $add->Nom; echo $add->Prenom; ?></td>
                            <td> <?php $add = $voitures->GetVoitureById($temp->FKVoiture); echo $add->Nom; ?></td>
                            <td> <?php $add = $circuits->GetCircuitById($temp->FKCircuit); echo $add->Nom; ?></td>
                        </tr>
                    <?php endforeach; } ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un nouveau temp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input class="form-control form-control-lg" type="text" name="temp" placeholder="Temps">    
            <select class="form-control form-control-lg"  name="pilote" required ><!--onchange="configureDropDownLists(this,document.getElementById('ddl2'))"-->
            <option value="" selected hidden >Pilote</option>
                <?php $mat = $pilotes->GetAllPilotes();foreach($mat as $pilote): ?>
                    <option value="<?php echo $pilote->ID;?>"><?php echo $pilote->Nom;?></option>
                <?php endforeach; ?>
            </select>
            
            
            <select class="form-control form-control-lg"  name="voiture" required  ><!--onchange="configureDropDownLists(this,document.getElementById('ddl2'))"-->

                    <?php $mat = $marques->GetAllMarques();foreach($mat as $marque): ?>
                        <optgroup label="<?php echo $marque->Nom;?>">
                            <option value="" selected hidden >Voiture</option>
                            <?php $mat = $voitures->GetVoituresByMarque($marque->ID);foreach($mat as $voiture): ?>
                                <option value="<?php echo $voiture->ID;?>"><?php echo $voiture->Nom;?></option>
                            <?php endforeach; ?>
                            <?php endforeach; ?>

                </optgroup>
            </select>

            <select class="form-control form-control-lg"  name="circuit" required id="ddl2">
            <option value="" selected hidden >Circuit</option>
                <?php $mat = $circuits->GetAllCircuits();foreach($mat as $circuit): ?>
                    <option value="<?php echo $circuit->ID;?>"><?php echo $circuit->Nom;?></option>
                <?php endforeach; ?>
            </select>
            
            
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un nouveau temp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="get">
            <select class="form-control form-control-lg"  name="pilote" ><!--onchange="configureDropDownLists(this,document.getElementById('ddl2'))"-->
            <option value="" selected hidden >Pilote</option>
                <?php $mat = $pilotes->GetAllPilotes();foreach($mat as $pilote): ?>
                    <option value="<?php echo $pilote->ID;?>"><?php echo $pilote->Nom;?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="form-control form-control-lg"  name="voiture"  ><!--onchange="configureDropDownLists(this,document.getElementById('ddl2'))"-->

                    <?php $mat = $marques->GetAllMarques();foreach($mat as $marque): ?>
                        <optgroup label="<?php echo $marque->Nom;?>">
                            <option value="" selected hidden >Voiture</option>
                            <?php $mat = $voitures->GetVoituresByMarque($marque->ID);foreach($mat as $voiture): ?>
                                <option value="<?php echo $voiture->ID;?>"><?php echo $voiture->Nom;?></option>
                            <?php endforeach; ?>
                            <?php endforeach; ?>

                </optgroup>
            </select>

            <select class="form-control form-control-lg"  name="circuit">
            <option value="" selected hidden >Circuit</option>
                <?php $mat = $circuits->GetAllCircuits();foreach($mat as $circuit): ?>
                    <option value="<?php echo $circuit->ID;?>"><?php echo $circuit->Nom;?></option>
                <?php endforeach; ?>
            </select>
            
            
            <button type="submit" class="btn btn-primary">Chercher</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

require_once 'footer.php';
?>