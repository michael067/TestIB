<?php
include "header.php";
if (isset($result)) {
    if (filter_var($result["id"], FILTER_VALIDATE_INT)) {
        echo "Prenom : " . $result["prenom"] . "<BR>Nom : " . $result["nom"] . "<BR>Telephone : " . $result["tel"] . "<BR>BIO : " . $result["bio"] . "<BR>";
    }
} else {
    http_response_code(404);
    header('Location: index.php');
    exit;
}
echo "<a href=\"".$_SESSION['chemin']."\" class=\"btn btn-primary\">Retour à L'index</a>";
include "footer.php";
