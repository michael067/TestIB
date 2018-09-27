<?php 


include "header.php"; 

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
                <td><?=$result->getPrenom();?></td>
                <td><?=$result->getNom();?></td>
                <td class="text-right">
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/show?id=<?=$result->getId();?>"><i class="fas fa-eye"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/pdf?id=<?=$result->getId();?>" target=_blank><i class="fas fa-file-pdf"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/edit?id=<?=$result->getId();?>"><i class="fas fa-edit"></i></a>
                    <a  class="btn btn-primary" href="<?=$_SESSION['chemin'];?>/delete?id=<?=$result->getId();?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
                
        
    </tbody>
</table>
<a href="<?=$_SESSION['chemin'];?>/add" class="btn btn-primary">Ajouter</a>
<?php include "footer.php"; ?>
