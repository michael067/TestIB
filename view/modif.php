<?php 
include "header.php";

if (isset($user)){
    if (filter_var($user->getId(),FILTER_VALIDATE_INT)){
?>
<form action="<?=$_SESSION['chemin'];?>/edit" method="post">
<input name="id" type=hidden readonly value="<?=$user->getId();?>">
<div class="row">
    <div class="col">
        Prenom :
    </div>
    <div class="col">  
     <input name="prenom" type="text" value="<?=$user->getPrenom();?>"><BR>
    </div>
</div>
<div class="row">
    <div class="col">
Nom :
</div>
    <div class="col"> 
     <input name="nom" type="text" value="<?=$user->getNom();?>"><BR>
</div>
</div>
<div class="row">
    <div class="col">
Tel : 
</div>
    <div class="col"> 
<input name="tel" type="text" value="<?=$user->getTel();?>"><BR>
</div>
</div>
<div class="row">
    <div class="col">
Bio : 
</div>
    <div class="col"> 
    <textarea name="bio"><?=$user->getBio();?></textarea><BR>
</div>
</div>
<input type="submit" value="Update">
</form>
<a href="<?=$_SESSION['chemin'];?>">Retour à L'index</a>

<?php
} 
} else {
    http_response_code(404);
    header('Location: '.$_SESSION['chemin'].'');
    exit;
}

include "footer.php";
?>
