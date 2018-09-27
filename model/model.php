<?php
 use Tuto\Entity\Contact;

function return_contacts(){

    $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../bootstrap.php']);
    
    //A quoi ca sert ???? => permet de preciser de quel entity on parle/travail , choix de la class used
    $userRepo = $entityManager->getRepository(Contact::class);

    $contacts= $userRepo->findAll();

    return $contacts;
}

function return_one_contact($id){
    if (isset($id)){
        
        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../bootstrap.php']);
       
        // Configuration du repository utilisé cad là ou se trouve la class dont on va se servir
        $user= $entityManager->find(Contact::class, $id);
        return $user;
    }

}

function delete($id){
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if (isset($id)){
        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../bootstrap.php']);

        $userRepo = $entityManager->getRepository(Contact::class);

        // Récupération de l'utilisateur (donc automatiquement géré par Doctrine)
        $userDelete = $userRepo->find($id);
        
        $entityManager->remove($userDelete);
        $entityManager->flush($userDelete);
    }
}

function edit($data){
    $id=filter_var($data['id'],FILTER_VALIDATE_INT);
    if (isset($id)){
        $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../bootstrap.php']);

$indexContact = $data['id'];


$userRepo = $entityManager->getRepository(Contact::class);

// Récupération de l'utilisateur (donc automatiquement géré par Doctrine)
$userUpdate = $userRepo->find($indexContact);

$userUpdate->setPrenom($data['prenom']);
$userUpdate->setNom($data['nom']);
$userUpdate->setTel($data['tel']);
$userUpdate->setBio($data['bio']);

$entityManager->flush();
    }
}

function ajout($data){
    
    $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../bootstrap.php']);

    // Instanciation de l'utilisateur
    
    $newContact = new Contact();
    $newContact ->setPrenom($data['prenom']);
    $newContact ->setNom($data['nom']);
    $newContact ->setTel($data['tel']);
    $newContact ->setBio($data['bio']);
    
    //preparation de la requete - permet de sauvegarder l'information => persist sur la db
    $entityManager->persist($newContact);

    //Pour envoyer la requete vers le bdd
    $entityManager->flush();
}


