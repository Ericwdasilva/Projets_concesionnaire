<?php
require_once('authentification/verif.php');
    require_once('connex.php');
    $title = "liste voitures";

    //var_dump($_SESSION);
    
?>
<?php require_once('partials/header.php'); ?>
<div class="container-fluid">
<a href="ajout.php" class="btn btn-warning text white"><i class="fa fa-plus-circle"></i>Ajout</a>
<h2>Liste des voitures</h2>
    <table class="table table-striped" id="example">
        <thead>
        <tr class="thead-dark">
            <th>ID</th>
            <th>MARQUE</th>
            <th>MODELE</th>
            <th>PAYS</th>
            <th>PRIX</th>
            <th>PHOTO</th>
            <th>DESCRIPTION</th>
            <th>DATE ARRIVEE</th>
            <th>ACTIONS</th>

        </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM voiture";
            $res = mysqli_prepare($connect, $sql);
            mysqli_stmt_execute($res);
            mysqli_stmt_bind_result($res, $id, $marque, $modele,$pays,$prix,$photo,$desc,$da);
            while(mysqli_stmt_fetch($res)){
        ?>
        <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $marque; ?></td>
                <td><?php echo $modele; ?></td>
                <td><?php echo $pays; ?></td>
                <td><?php echo $prix; ?></td>
                <td><img src="images/<?php echo $photo; ?>" width= "50" height= "50"> </td>
                <td><?php echo substr($desc,1,50); ?></td>
                <td><?php echo $da; ?></td>
                <td>
                <a href="editer.php?code=<?php echo $id; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i>Editer</a>
                <a onclick="return confirm('Etes vous sûr de supprimer?..')" href="supprimer.php? code=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Supprimer</a>
                </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once('partials/footer.php'); ?>
