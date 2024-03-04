<h1><strong>EXO BANQUE</strong></h1>

<p><strong><em>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires et leurs comptes bancaires respectifs.</em></strong></p>


<?php

spl_autoload_register(function ($class) {
    require 'Classes/' . $class . '.php';
});

$robert= new Titulaire (" Shakhmuradyan "," Robert ","2001/03/22"," Strasbourg ");
$compte1= new Compte(" Compte Courant ",20," € ",$robert);
$compte2=new Compte(" Livret A ", 1500, " € ",$robert);


echo $robert->getinfo();
echo $compte1->infotitulaire();
?>