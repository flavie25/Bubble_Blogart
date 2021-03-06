<?
/////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : likeCom.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

    // insertion classe STATUT
    require_once __DIR__ . './../../CLASS_CRUD/likeCom.class.php';
    global $db;
    $likeCom = new LIKECOM;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like sur Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">

    <link rel="stylesheet" href="./../../front/assets/css/nav.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/gestionCRUD.css" >

</head>
<body>
<?php
    include __DIR__ ."./../commons/navbar.php";
    ?>
    <div class="wrapper">
        <div class="hautpage">
            <div class="Titre">
                <h1>BLOGART21 Admin - Gestion du CRUD Like sur Commentaire</h1>

                <h2>Tous les likes sur commentaire</h2>

            </div>

            <div class="creerBt">
                <button class="button" onclick="location.href='./createLikeCom.php'">
                    Liker un commentaire
                </button>
            </div>
        </div>
<div class="tableArea">
	<table class="tableau">
    <thead class="entete">
        <tr>
            <th>&nbsp;Membre&nbsp;</th>
            <th>&nbsp;Article&nbsp;</th>
            <th>&nbsp;Commentaire&nbsp;</th>
            <th>&nbsp;Like&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody class="body">
<?
    $allLikeCom = $likeCom->get_AllLikeCom();
    foreach($allLikeCom as $row){
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["pseudoMemb"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["libTitrArt"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libCom"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["likeC"]; ?> &nbsp;</td>

		<td>&nbsp;<a class="button" href="./updateLikeCom.php?id1=<?=$row["numMemb"];?>&id2=<?=$row["numArt"];?>&id3=<?=$row["numSeqCom"];?>"><i>Modifier</i></a>&nbsp;
		<br/></td>
        </tr>
<?
	}	// End of foreach
?>
    </tbody>
    </table>
</div>
</div>

<?
require_once __DIR__ . './footer.php';
?>
</body>
</html>
