<?php
function list_action(){
    $contacts=return_contacts();
    include_once ("view/view.php");
}

function show_action($id){
    if (isset($_GET['id'])){
        $id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
        if (is_int($id)){
            $result = return_one_contact($id);
            include_once ("view/viewDetail.php");
        }
    }
}

function edit_action($id){
    if (isset($_GET['id'])){
        $id=filter_var($_GET['id'],FILTER_VALIDATE_INT);
        if (isset($id)){
            $result = return_one_contact($id);
            include_once ("view/modif.php");
        }
    }
}

function edit_valid($POST){
    if (isset($POST['id']) AND isset($POST['nom']) AND isset($POST['prenom']) AND isset($POST['tel'])){
        $newstr['id'] = filter_var($POST['id'], FILTER_SANITIZE_STRING);
        $newstr['nom'] = filter_var($POST['nom'], FILTER_SANITIZE_STRING);
        $newstr['prenom'] = filter_var($POST['prenom'], FILTER_SANITIZE_STRING);
        $newstr['tel'] = filter_var($POST['tel'], FILTER_SANITIZE_STRING);
        $newstr['bio'] = filter_var($POST['bio'], FILTER_SANITIZE_STRING);
        edit($newstr);
        $_SESSION['message']="Utilisateur bien edité";
        $_SESSION['couleur']="jaune";        
        header('Location: '.$_SESSION["chemin"].'');
    } elseif (isset($POST['nom']) AND isset($POST['prenom']) AND isset($POST['tel'])){
        $newstr['nom'] = filter_var($POST['nom'], FILTER_SANITIZE_STRING);
        $newstr['prenom'] = filter_var($POST['prenom'], FILTER_SANITIZE_STRING);
        $newstr['tel'] = filter_var($POST['tel'], FILTER_SANITIZE_STRING);
        $newstr['bio'] = filter_var($POST['bio'], FILTER_SANITIZE_STRING);
        ajout($newstr);
        $_SESSION['message']="Utilisateur bien ajouté";
        $_SESSION['couleur']="vert";
        header('Location: '.$_SESSION["chemin"].'');
    } else {
        header('HTTP/1.1 404 Not Found');
        echo $uri;
        echo '<html><body><h1>Page Not Found</h1></body></html>';
    }
}

function delete_action($GET){
    $id=filter_var($GET['id'],FILTER_VALIDATE_INT);
    if (is_int($id)){
        delete($id);
        $_SESSION['message']="Utilisateur bien supprimé";
        $_SESSION['couleur']="rouge";
        header('Location: '.$_SESSION["chemin"].'');
    }
}


function add_action(){
    include_once ("view/ajouter.php");
}

?>