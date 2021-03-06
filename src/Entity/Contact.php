<?php

namespace Tuto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Contact{

    //Definition propriété de la class Contact - les variables 
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $id;

    /**
    * @ORM\Column(type="text")
    */
    private $prenom;

    /**
    * @ORM\Column(type="text")
    */
    private $nom;

    /**
    * @ORM\Column(type="text")
    */
    private $tel;

    /**
    * @ORM\Column(type="text")
    */
    private $bio;

    //Definition des getter , permet de récuperer les information des propriétes
    public function getId(){
        return $this->id;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getTel(){
        return $this->tel;
    }
    public function getBio(){
        return $this->bio;
    }


    //Definition des setter , permet de modifier les valeurs des attributs
    public function setId($id){
        return $this->id = $id;
    }
    public function setPrenom($prenom){
        return $this->prenom = $prenom;
    }
    public function setNom($nom){
        return $this->nom = $nom;
    }
    public function setTel($tel){
        return $this->tel = $tel;
    }
    public function setBio($bio){
        return $this->bio = $bio;
    }

}