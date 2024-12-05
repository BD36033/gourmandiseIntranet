<?php

class HistoriqueVue
{
    private $parametre = [];
    private $tpl; // propriété de type objet (smarty)

    public function __construct($parametre)
    {
        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function chargementValeurs()
    {
        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('login', $_SESSION['prenomNom']);

        $this->tpl->assign('titreVue', 'Gourmandise SARL');

        $this->tpl->assign('codev',$_SESSION['codev']);

    }

    public function genererAffichageListe($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des historiques');

        $this->tpl->assign('listeHistoriques', $valeurs);

        $this->tpl->display('mod_historique/vue/historiqueListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {

        $this->chargementValeurs();

        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('readonly', 'disabled');

                $this->tpl->assign('required', '');

                $this->tpl->assign('titrePage', 'Fiche historique :  Consultation');

                $this->tpl->assign('listeHistoriques', $valeurs);

                break;

            case 'form_supprimer':
            case 'supprimer':
                $this->tpl->assign('action', 'supprimer');

                $this->tpl->assign('readonly', 'readonly');

            $this->tpl->assign('required', '');

                $this->tpl->assign('titrePage', 'Fiche historique :  Suppression');

                $this->tpl->assign('listeHistoriques', $valeurs);
                break;

            case 'form_modifier':
            case 'modifier':
                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('readonly', '');

                $this->tpl->assign('required', 'required');

                $this->tpl->assign('titrePage', 'Fiche historique :  Modification');

                $this->tpl->assign('listeHistoriques', $valeurs);
                break;
        }

        $this->tpl->display('mod_historique/vue/historiqueFicheVue.tpl');
    }

}