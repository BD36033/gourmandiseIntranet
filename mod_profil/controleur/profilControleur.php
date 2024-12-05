<?php

class ProfilControleur
{

    private $parametre = []; // tableau = $_REQUEST
    private $oModele; //propriété de type objet
    private $oVue;  // propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        // Création d'un objet, instance de la classe ProfilModele
        $this->oModele = new ProfilModele($this->parametre);
        // Création d'un objet, instance de la classe ProfilVue
        $this->oVue = new ProfilVue($this->parametre);
    }

    public function form_consulter()
    {

        $unProfil = $this->oModele->getUnProfil();
        $this->oModele->chercheCommande($unProfil);
        $this->oVue->genererAffichageFiche($unProfil);
    }

    public function form_modifier()
    {

        $unProfil = $this->oModele->getUnProfil();
        $this->oModele->chercheCommande($unProfil);
        $this->oVue->genererAffichageFiche($unProfil);
    }

    public function modifier()
    {
        if (isset($_POST['btn-valider-mdp'])) {
            $nouveauMotdepasse = $_POST['nouveau_motdepasse'];
            $confirmationMotdepasse = $_POST['confirmation_motdepasse'];

            if ($nouveauMotdepasse === $confirmationMotdepasse) {
                $this->parametre['motdepasse'] = $nouveauMotdepasse;
                $controleProfil = new ProfilTable($this->parametre);
                if (strlen($nouveauMotdepasse) >= 6) {
                    if ($controleProfil->getAutorisationBD() == false) {
                        $this->oVue->genererAffichageFiche($controleProfil);
                    } else {
                        $this->oModele->updateProfil($controleProfil);
                        $this->oModele->getUnProfil();
                        $this->oVue->genererAffichageFiche($controleProfil);
                    }
                } else {
                    $controleProfil = new ProfilTable($this->parametre);
                    ProfilTable::setMessageErreur("Le mot de passe doit avoir une taille de 6 caractéres minimum !!");
                    $this->oVue->genererAffichageFiche($controleProfil);
                }
            } else {
                $controleProfil = new ProfilTable($this->parametre);
                ProfilTable::setMessageErreur("Les mots de passe ne correspondent pas !!");
                $this->oVue->genererAffichageFiche($controleProfil);
            }
        } else {
            $controleProfil = new ProfilTable($this->parametre);

            if ($controleProfil->getAutorisationBD() == false) {
                //Retour à la fiche
                $this->oVue->genererAffichageFiche($controleProfil);
            } else {
                // Insertion BD puis retour liste des profils
                $this->oModele->updateProfil($controleProfil);
                $this->oModele->getUnProfil();
                $this->oVue->genererAffichageFiche($controleProfil);
            }
        }
    }
}

