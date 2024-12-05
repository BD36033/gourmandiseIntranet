<?php

class ProduitControleur
{

    private $parametre = []; // tableau = $_REQUEST
    private $oModele; //propriété de type objet
    private $oVue;  // propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        // Création d'un objet, instance de la classe ProduitModele
        $this->oModele = new produitModele($this->parametre);
        // Création d'un objet, instance de la classe ProduitVue
        $this->oVue = new produitVue($this->parametre);
    }

    public function lister()
    {

        $listeProduit = $this->oModele->getListeProduit();

        $this->oVue->genererAffichageListe($listeProduit);
    }

    public function form_consulter()
    {

        $unProduit = $this->oModele->getUnProduit();
        $this->oModele->getPoids($unProduit);
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_ajouter()
    {
        $prepareProduit = new ProduitTable();

        $this->oVue->genererAffichageFiche($prepareProduit);
    }

    public function ajouter()
    {
        if ($this->parametre['descriptif'] === 'G') {
            $this->parametre['poidsP'] = 0;
        }
        $controleProduit = new ProduitTable($this->parametre);

        if ($controleProduit->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleProduit);
        } else {
            // Insertion BD puis retour liste des Produits
            $this->oModele->addProduit($controleProduit);
            $this->lister();
        }
    }

    public function form_supprimer()
    {

        $unProduit = $this->oModele->getUnProduit();
        $this->oModele->getPoids($unProduit);
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function supprimer()
    {

        $controleProduit = new ProduitTable($this->parametre);

        if ($controleProduit->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleProduit);
        } else {
            // Insertion BD puis retour liste des produits
            $this->oModele->deleteProduit($controleProduit);
            $this->lister();
        }
    }

    public function form_modifier()
    {

        $unProduit = $this->oModele->getUnProduit();
        $this->oModele->getPoids($unProduit);
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function modifier()
    {

        $controleProduit = new ProduitTable($this->parametre);

        if ($controleProduit->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleProduit);
        } else {
            // Insertion BD puis retour liste des Produits
            $this->oModele->updateProduit($controleProduit);
            $this->lister();
        }
    }
}

