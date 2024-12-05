<?php

class ClientControleur
{

    private $parametre = []; // tableau = $_REQUEST
    private $oModele; //propriété de type objet
    private $oVue;  // propriété de type objet

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        // Création d'un objet, instance de la classe ClientModele
        $this->oModele = new ClientModele($this->parametre);
            // Création d'un objet, instance de la classe ClientVue
            $this->oVue = new ClientVue($this->parametre);
    }

    public function lister()
    {

        $listeClients = $this->oModele->getListeClient();

        $this->oVue->genererAffichageListe($listeClients);
    }

    public function form_consulter()
    {

        $unClient = $this->oModele->getUnClient();
        $this->oModele->getCAclient($unClient);
        $this->oModele->getCApourcentage($unClient);
        $this->oModele->getArticlesPopulaire($unClient);
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function form_ajouter()
    {
        $prepareClient = new ClientTable();

        $this->oVue->genererAffichageFiche($prepareClient);
    }

    public function ajouter()
    {

        $controleClient = new ClientTable($this->parametre);

        if ($controleClient->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleClient);
        } else {
            // Insertion BD puis retour liste des clients
            $this->oModele->addClient($controleClient);
            $this->lister();
        }
    }

    public function form_supprimer()
    {

        $unClient = $this->oModele->getUnClient();
        $this->oModele->getCAclient($unClient);
        $this->oModele->getCApourcentage($unClient);
        $this->oModele->getArticlesPopulaire($unClient);
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function supprimer()
    {

        $controleClient = new ClientTable($this->parametre);
//        var_dump($controleClient);
//        die();
        $row = $this->oModele->verifieCommande($controleClient);

        if ($row) {
            // Insertion BD puis retour liste des clients
            $this->oModele->deleteClient($controleClient);
            $this->lister();
        } else {
            $this->oVue->genererAffichageFiche($controleClient);

        }
    }

    public function form_modifier()
    {

        $unClient = $this->oModele->getUnClient();
        $this->oModele->getCAclient($unClient);
        $this->oModele->getCApourcentage($unClient);
        $this->oModele->getArticlesPopulaire($unClient);
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function modifier()
    {

        $controleClient = new ClientTable($this->parametre);

        if ($controleClient->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleClient);
        } else {
            // Insertion BD puis retour liste des clients
            $this->oModele->updateClient($controleClient);
            $this->lister();
        }
    }
}

