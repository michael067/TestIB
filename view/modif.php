<?php 
include "header.php";

if (isset($result)){
    if (filter_var($result["id"],FILTER_VALIDATE_INT)){
?>
<form action="'.$_SESSION['chemin'].'/edit" method="post">
<input name="id" type=hidden readonly value="<?=$result["id"];?>">
<div class="row">
    <div class="col">
        Prenom :
    </div>
    <div class="col">  
     <input name="prenom" type="text" value="<?=$result["prenom"];?>"><BR>
    </div>
</div>
<div class="row">
    <div class="col">
Nom :
</div>
    <div class="col"> 
     <input name="nom" type="text" value="<?=$result["nom"];?>"><BR>
</div>
</div>
<div class="row">
    <div class="col">
Tel : 
</div>
    <div class="col"> 
<input name="tel" type="text" value="<?=$result["tel"];?>"><BR>
</div>
</div>
<div class="row">
    <div class="col">
Bio : 
</div>
    <div class="col"> 
    <textarea name="bio"><?=$result["bio"];?></textarea><BR>
</div>
</div>
<input type="submit" value="Update">
</form>
<a href="/formation/codeAnnuaire/index.php">Retour à L'index</a>

<?php
} 
} else {
    http_response_code(404);
    header('Location: index.php');
    exit;
}

include "footer.php";
?>
