<?php
Class ProfilVue{
    public $parametre = [] ;
    private $tpl; // propriété de type objet (smarty)
    public function __construct($parametre)
    {
        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }
    public function chargementValeurs(){
        $this->tpl->assign('deconnexion', 'Déconnexion');

        $this->tpl->assign('login', $_SESSION['prenomNom']);

        $this->tpl->assign('titreVue', 'Gourmandise SARL');

        $this->tpl->assign('codev',$_SESSION['codev']);
    }

    public function genererAffichageFiche($valeurs){

        $this->chargementValeurs();
        switch($this->parametre['action']){
            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');

                $this->tpl->assign('readonly', 'disabled');

                $this->tpl->assign('titrePage', 'Fiche profil :  Consultation');

                $this->tpl->assign('unProfil',$valeurs);
                break;

            case 'form_modifier':
                case 'modifier':
                    $this->tpl->assign('action', 'modifier');

                    $this->tpl->assign('readonly', '');

                    $this->tpl->assign('titrePage', 'Fiche profil :  Modification');

                    $this->tpl->assign('unProfil',$valeurs);
                break;
        }

        $this->tpl->display('mod_profil/vue/profilFicheVue.tpl');
    }

}