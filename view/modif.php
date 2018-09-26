<?php
include "header.php";
if (isset($result)){
    if (filter_var($result["id"],FILTER_VALIDATE_INT)){
        echo '<form action="'.$_SESSION['chemin'].'/edit" method="post">';
        echo '<input name="id" type=hidden readonly value="'.$result["id"] . '"><BR>';
        echo 'Prenom : <input name="prenom" type="text" value="' . $result["prenom"] . '"><BR>';
        echo 'Nom : <input name="nom" type="text" value="' . $result["nom"] . '"><BR>';
        echo 'Tel : <input name="tel" type="text" value="' . $result["tel"] . '"><BR>';
        echo 'Bio : <textarea name="bio">' . $result["bio"] . '</textarea><BR>';
        echo '<input type="submit" value="GO GO GO"></form>';
    } 
} else {
    http_response_code(404);
    header('Location: index.php');
    exit;
}
echo "<a href=\"".$_SESSION['chemin']."\">Retour à L'index</a>";
include "footer.php";
