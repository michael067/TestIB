<?php

function connect_db(){
    try {
        $link = new PDO("mysql:dbname=annuaire;host=127.0.0.1", "annuaire", "annuaire");
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $link;
}

function close_db(&$link){
    $link = null;
}

function return_contacts(){
    $link=connect_db();
    $sth = $link->prepare("SELECT * FROM contact");
    $sth->execute();
    while($result = $sth->fetch(PDO::FETCH_ASSOC)){
        $contacts[] = $result;
    }
    close_db($link);
    return $contacts;
}

function return_one_contact($id){

    if (isset($id)){
        $link=connect_db();
        $sth = $link->prepare("SELECT * FROM contact where id=$id");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        close_db($link);
        if (filter_var($result["id"],FILTER_VALIDATE_INT)){
            return $result;
        }
    } else {
        http_response_code(404);
        header('Location: /controller/index.php');
        exit;
    }
}

function delete($id){
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if (isset($id)){
        $link=connect_db();
        $sth = $link->prepare("SELECT * FROM contact where id=$id");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if (filter_var($result["id"],FILTER_VALIDATE_INT)){
            $sth = $link->prepare("DELETE FROM contact where id=$id");
            $sth->execute();
        }
        close_db($link);
    }
}

function edit($data){
    $id=filter_var($data['id'],FILTER_VALIDATE_INT);
    if (isset($id)){
        $link=connect_db();
        $sth = $link->prepare("UPDATE contact set nom='" . $data['nom'] . "',prenom='" . $data['prenom'] . "',tel='" . $data['tel'] . "',bio='" . $data['bio'] . "' where id=" . $data['id']);
        $sth->execute();
        close_db($link);
    }
}

function ajout($data){
        $link=connect_db();
        $sth = $link->prepare("INSERT contact set nom='" . $data['nom'] . "',prenom='" . $data['prenom'] . "',tel='" . $data['tel'] . "',bio='" . $data['bio'] . "'");
        $sth->execute();
        close_db($link);
}


