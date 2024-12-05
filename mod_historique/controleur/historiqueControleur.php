<?php

class HistoriqueControleur
{

    private $parametre = []; // tableau = $_REQUEST
    private $oModele; //propriété de type objet
    private $oVue;  // propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        // Création d'un objet, instance de la classe HistoriqueModele
        $this->oModele = new HistoriqueModele($this->parametre);
            // Création d'un objet, instance de la classe HistoriqueVue
            $this->oVue = new HistoriqueVue($this->parametre);
    }

    public function listerTT()
    {
        $etat = '*';
        $listeHistoriques = $this->oModele->getListeHistorique($etat);

        $this->oVue->genererAffichageListe($listeHistoriques);
    }
    public function listerNV()
    {
        $etat = '2';
        $listeHistoriques = $this->oModele->getListeHistorique($etat);

        $this->oVue->genererAffichageListe($listeHistoriques);
    }
    public function listerAN()
    {
        $etat = '3';
        $listeHistoriques = $this->oModele->getListeHistorique($etat);

        $this->oVue->genererAffichageListe($listeHistoriques);
    }

    public function form_consulter()
    {

        $unHistorique = $this->oModele->getUnHistorique();
        $this->oVue->genererAffichageFiche($unHistorique);
    }


    public function form_supprimer()
    {

        $unHistorique = $this->oModele->getUnHistorique();
        $this->oVue->genererAffichageFiche($unHistorique);
    }

    public function supprimer()
    {

        $controleHistorique = new HistoriqueTable($this->parametre);

        $row = $this->oModele->verifieCommande($controleHistorique);

        if ($row) {
            // Insertion BD puis retour liste des historiques
            $this->oModele->deleteHistorique($controleHistorique);
            $this->lister();
        } else {
            $this->oVue->genererAffichageFiche($controleHistorique);

        }
    }

    public function form_modifier()
    {

        $unHistorique = $this->oModele->getUnHistorique();
        $this->oVue->genererAffichageFiche($unHistorique);
    }

    public function modifier()
    {

        $controleHistorique = new HistoriqueTable($this->parametre);

        if ($controleHistorique->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleHistorique);
        } else {
            // Insertion BD puis retour liste des historiques
            $this->oModele->updateHistorique($controleHistorique);
            $this->lister();
        }
    }
}

