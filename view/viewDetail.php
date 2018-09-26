<?php
include "header.php";

if (isset($result)){
    if (filter_var($result["id"],FILTER_VALIDATE_INT)){
?>
<div class="row">
    <div class="col">
        Prenom :
    </div>
    <div class="col">  
    <?=$result["prenom"];?>
    </div>
</div>
<div class="row">
    <div class="col">
Nom :
</div>
    <div class="col"> 
    <?=$result["nom"];?>
</div>
</div>
<div class="row">
    <div class="col">
Tel : 
</div>
    <div class="col"> 
    <?=$result["tel"];?>
</div>
</div>
<div class="row">
    <div class="col">
Bio : 
</div>
    <div class="col"> 
    <?=$result["bio"];?>
    </div>
</div>
<br>
<div><a href="<?=$_SESSION['chemin'];?>" class="btn btn-primary">Retour à L'index</a></div>


<?php 

    } 
} 
else {
    http_response_code(404);
    header('Location: index.php');
    exit;
}

include "footer.php"; 

?>
