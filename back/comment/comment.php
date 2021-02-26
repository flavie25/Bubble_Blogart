<?
/////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : comment.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
global $db;
$comment = new COMMENT;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/gestionCRUD.css" >

</head>
<body class="fullpage">
<div class="hautpage">
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>

        <h2>Tous les commentaires</h2>

    </div>

    <div class="creerBt">
        <button class="button" onclick="location.href='./createComment.php'">
            Créer un commentaire
        </button>
    </div>
</div>
<div class="tableArea">
    <table class="tableau">
        <thead class="entete">
            <tr>
                <th>&nbsp;NumSeqCom&nbsp;</th>
                <th>&nbsp;NumArticle&nbsp;</th>
                <th>&nbsp;DtCreCom&nbsp;</th>
                <th>&nbsp;LibCom&nbsp;</th>
                <th>&nbsp;AttModOK&nbsp;</th>
                <th>&nbsp;AffComOK&nbsp;</th>
                <th>&nbsp;NotifComKOAff&nbsp;</th>
                <th>&nbsp;delLogiq&nbsp;</th>
                <th>&nbsp;numMemb&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody class="body">
            <?
            $allComment = $comment->get_AllComment();
            foreach($allComment as $row){
            // Appel méthode : tous les commentaires en BDD

            // Boucle pour afficher
            //foreach($all as $row) {
            ?>
                <tr>
                <td><h4>&nbsp; <?php echo $row["numSeqCom"]; ?> &nbsp;</h4></td>
                <td>&nbsp; <?php echo $row["numArt"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["dtCreCom"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["libCom"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["attModOK"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["affComOK"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["notifComKOAff"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["delLogiq"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["numMemb"]; ?> &nbsp;</td>
                <?
                    $numSeqCom = $row["numSeqCom"];
                    $numArt = $row["numArt"];
                ?>
                <td>&nbsp;<a class="button" href="./updateComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>"><i>Valider</i></a>&nbsp;
                <br /></td>
                <td>&nbsp;<a class="button" href="./deleteComment.php?id=<?=$numSeqCom."&id2=".$numArt;?>"><i>Supprimer</i></a>&nbsp;
                <br /></td>
                </tr>
            <?
            }	// End of foreach
            ?>
            </tbody>
    </table>
</div>

    <br><br>

    <?
    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>
