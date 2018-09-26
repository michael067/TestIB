<?php include "header.php"; ?>
<form action="<?=$_SESSION['chemin'];?>/edit" method="post">
<div class="row">
    <div class="col">
        Prenom :
    </div>
    <div class="col">  
     <input name="prenom" type="text" value=""><BR>
    </div>
</div>
<div class="row">
    <div class="col">
Nom :
</div>
    <div class="col"> 
     <input name="nom" type="text" value=""><BR>
</div>
</div>
<div class="row">
    <div class="col">
Tel : 
</div>
    <div class="col"> 
<input name="tel" type="text" value=""><BR>
</div>
</div>
<div class="row">
    <div class="col">
Bio : 
</div>
    <div class="col"> 
    <textarea name="bio"></textarea><BR>
</div>
</div>
<input type="submit" value="Ajouter">
</form>
<a href="<?=$_SESSION['chemin'];?>">Retour à L'index</a>
<?php include "footer.php"; ?>
