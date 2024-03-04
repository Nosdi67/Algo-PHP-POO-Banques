<?php


class Compte{

private string $libellé;
private float $solde;
private string $deviseMonétaire;
private Titulaire $titulaire;


public function __construct(string $libellé, float $solde, string $deviseMonétaire, Titulaire $titulaire){

    $this->libellé=$libellé;
    $this->solde=$solde;
    $this->deviseMonétaire=$deviseMonétaire;
    $this->titulaire=$titulaire;
    $this->titulaire->addComptes($this);
    
    
}

//************GETTER et SETTER***************
    public function getLibellé(){

    return $this->libellé;
    }


    public function setLibellé($libellé){
    $this->libellé = $libellé;

    return $this;
    }


    public function getSolde(){
    
    return $this->solde;
    }


    public function setSolde($solde){
    $this->solde = $solde;

    return $this;
    }

    
    public function getDeviseMonétaire(){
    return $this->deviseMonétaire;
    }

    
    public function setDeviseMonétaire($deviseMonétaire){
    $this->deviseMonétaire = $deviseMonétaire;

    return $this;
    }

    public function getTitulaire(){
    return $this->titulaire;
    }


    public function setTitulaire($titulaire){
    $this->titulaire = $titulaire;

    return $this;
    }

    

  
//*************************************************************
    public function depot(int $ajout){ //Creation de la function depot avec une valeur int de X€

        $this->solde+=$ajout; //simple calcule

        return $this->solde. "€";//renvoi du resultat;
    }

    public function retirer(int $retirer){//la meme chose qu'en haut mais avec une condition

        if($this->solde<=$retirer){//si le montant qu'on veut retirer est supperieur a notre solde il affichera un msg d'erreur
            echo "Vous ne pouvez pas retirer un montant supperieur a ";
        }else{
                                //si non
        $this->solde-=$retirer;//il fera une soustraction
        }
        return $this->solde. "€".'<br>';//et renverra le resultat avec notre solde MàJ
    }

    public function virement(Compte $destinataire ,float $montant){// pour faire un viemenr on va chosir le compte qu'on veut + la somme qu'on veut envoyer

        if($this->solde>=$montant){// si le montant est supperieur a notre solde il dira ok

        $this->solde-=$montant;
        $destinataire->solde+=$montant;//addition du montant a notre solde
        
        echo "Virement de $montant € envoyé".'<br>';
    }else{
        echo " Vous ne disposez pas assez de fonds pour cette operation ".'<br>';// si non il dira non
    }
    
   }

   public function infoTitulaire(){//recuperation des info du titulaire du compte

    return "Compte de: ".$this->titulaire .'<br>'.//$this->titulaire psk on a donné les infos qu'il faut dans le toString dans la classe Titulaire
            $this->getLibellé().'<br>'.//recuperation libellé
            "Solde: ".$this->getSolde(). $this->getDeviseMonétaire(). '<br>';//recuperation du solde + devise monaitaire Càd €
   }


//********************To String*******************

    public function __toString(){//to string pour un raccourci

        return $this->libellé. " Solde: ". $this->solde. "€";
    }
}



?>