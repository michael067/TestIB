<?php
include "header.php";

if ($user){
?>
<div class="row">
    <div class="col">
        Prenom :
    </div>
    <div class="col">  
    <?=$user->getPrenom();?>
    </div>
</div>
<div class="row">
    <div class="col">
Nom :
</div>
    <div class="col"> 
    <?=$user->getNom();?>
</div>
</div>
<div class="row">
    <div class="col">
Tel : 
</div>
    <div class="col"> 
    <?=$user->getTel();?>
</div>
</div>
<div class="row">
    <div class="col">
Bio : 
</div>
    <div class="col"> 
    <?= $user->getBio();?>
    </div>
</div>
<br>
<div><a href="<?=$_SESSION['chemin'];?>" class="btn btn-primary">Retour à L'index</a></div>


<?php 
} 
else {
    http_response_code(404);
    header('Location: '.$_SESSION['chemin'].'');
    exit;
}

include "footer.php"; 

?>
