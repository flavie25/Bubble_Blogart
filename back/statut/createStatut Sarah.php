<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    global $db;
    $monStatut = new STATUT;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createStatut.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libStat'])) AND !empty($_POST['libStat']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides
            $erreur = false;

            $libStat = ctrlSaisies(($_POST['libStat']));

            $monStatut->create($libStat);

            header("Location: ./statut.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . '/initStatut.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/createStatut.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/gestionCommentaire.css" >
  
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap');
      @import url('https://fonts.googleapis.com/css2family=Lato&display=swap');
 </style>

</head>
<body>
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
            <h2>Ajout d'un statut</h2>
    </div>

    <form method="post" action="./createStatut.php" enctype="multipart/form-data">

      <fieldset>
    
    <div class="sousTitre">
      <legend class="legend1">Formulaire Statut</legend>
    </div>   

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nom du statut :</label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" autofocus="autofocus" />
        </div>

        <div class="control-group">
            <div class="controls">
                
                <input class="button" type="submit" value="Initialiser" style="cursor:pointer" name="Submit" />
                <input class="button" type="submit" value="Valider" style="cursor:pointer" name="Submit" />

            </div>
        </div>
      </fieldset>
    </form>
<?php
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
