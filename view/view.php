<?php include "header.php"; ?>
<?php 
if (isset($_SESSION['message'])){
    switch ($_SESSION['couleur']){
        case "jaune":
            echo "<div class=\"alert alert-warning\" role=\"alert\">";
            echo $_SESSION['message'];
            echo "</div>";
            break;
            case "vert":
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo $_SESSION['message'];
            echo "</div>";
            break;
            case "rouge":
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo $_SESSION['message'];
            echo "</div>";
            break;
    }
    $_SESSION['message']=null;
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contacts as $result) { ?>
            <tr>
                <td><?=$result["prenom"]?></td>
                <td><?=$result["nom"]?></td>
                <td class="text-right">
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/show?id=<?=$result["id"]?>"><i class="fas fa-eye"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/pdf?id=<?=$result["id"]?>" target=_blank><i class="fas fa-file-pdf"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/edit?id=<?=$result["id"]?>"><i class="fas fa-edit"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/delete?id=<?=$result["id"]?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
                
        
    </tbody>
</table>
<a href="<?=$_SESSION['chemin'];?>/add" class="btn btn-primary">Ajouter</a>
<?php include "footer.php"; ?>
