<?php


class Titulaire{

    private string $nom;
    private string $prenom;
    private DateTime $dateDeNaissance;
    private string $ville;
    private array $comptes;

public function __construct(string $nom, string $prenom, string $dateDeNaissance, string $ville,){

    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->dateDeNaissance= new DateTime ($dateDeNaissance);
    $this->ville=$ville;
    $this->comptes=[];//tableau vide avec les comptes qui seront rajoutés
    
}

  
//***************GETTER et SETTER********************
    public function getPersonne(){
        return $this->personne;
    }

   
    public function setPersonne($personne){
        $this->personne = $personne;

        return $this;
    }

   
    public function getVille(){
        return $this->ville;
    }

    
    function setVille($ville){
        $this->ville = $ville;

        return $this;
    }

   
    public function getDateDeNaissance(){
        
        return $this->dateDeNaissance->format('d-m-Y');//format d'affichage de la date de naissance
    }

  
    public function setDateDeNaissance($dateDeNaissance){
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }


    public function getNom(){
        return $this->nom;
    }

   
    public function setNom($nom){
        $this->nom = $nom;

        return $this;
    }

    
    public function getPrenom(){
       
        return $this->prenom;
    }

   
    public function setPrenom($prenom){
        $this->prenom = $prenom;

        return $this;
    }



    public function addComptes(Compte $compte){

        $this->comptes[]=$compte;
    }

    public function afficherComptes(){
        
        $resultat="";//on donne une valeur vide ici pour apres afficher les comptes dans la variable resultat
        
        foreach($this->comptes as $compte){

            $resultat.=$compte.'<br>';
            // $resultat=$resultat.$compte;
            
        }
        
        return $resultat ; //afficher les comptes du titulaire
    }

    public function age(){//calcule d'age

        $dateDuJour=new DateTime();//variable avec un DateTime vide qui prendera la date du jour
        $calculeAge=$dateDuJour->diff($this->dateDeNaissance);// faire une soustraction de 2 dates, date du jour et la date de naissance de la personne
        return $calculeAge->y. " Ans";// convertion en année + "Ans"
        
        
    }

    public function getInfo(){// recuperatin de tout les info 

        return "Informations personnels de $this :".'<br>'.
                "Nom: ". $this->getNom().'<br>'.
                "Prenom: ".$this->getPrenom(). '<br>'.
                "Date de naissance: ".$this->getDateDeNaissance(). "(".$this->age().")".'<br>'.
                "Ville: ".$this->getVille().'<br>'.
                "Les Comptes Bancaires: ".'<br>'.
                $this->afficherComptes().'<br>';
    }


    //****************To string*********************
    public function __toString(){// un raccourci 

        return $this->nom.$this->prenom;
    }

}


?>