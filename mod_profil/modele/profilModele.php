<?php

class ProfilModele extends Modele
{

    private $parametre = []; //Tableau = $_REQUEST du fichier index

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getUnProfil()
    {
        $sql = "SELECT * FROM vendeur WHERE codev = ?";
        $codev = $_SESSION['codev'];
        $idRequete = $this->executeRequete($sql, [$codev]); // requête préparée

        return new ProfilTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    public function updateProfil(ProfilTable $valeurs)
    {
        if (empty($valeurs->getMotdepasse())) {
            $sql = "UPDATE vendeur SET nom = ?, prenom = ? , adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codev = ?";
            $idRequete = $this->executeRequete($sql, [
                $valeurs->getNom(),
                $valeurs->getPrenom(),
                $valeurs->getAdresse(),
                $valeurs->getCp(),
                $valeurs->getVille(),
                $valeurs->getTelephone(),
                $valeurs->getCodev()
            ]);
            if ($idRequete) {
                ProfilTable::setMessageSucces("Modification du profil correctement effectué.");
            }
        } else {
            $sql = "UPDATE vendeur SET motdepasse = ? WHERE codev = ?";
            $idRequete = $this->executeRequete($sql, [
                $valeurs->getMotdepasse(),
                $valeurs->getCodev(),
            ]);
            if ($idRequete) {
                ProfilTable::setMessageSucces("Modification du mot de passe du profil correctement effectuée.");
            }
        }
    }


    public function chercheCommande(ProfilTable $valeurs)
    {
        $sql = "SELECT SUM(total_ht)AS THT FROM commande WHERE codev = ?";
        $codev = $_SESSION['codev'];
        $idRequete = $this->executeRequete($sql, [
            $codev
        ]);

        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        if ($row['THT'] == NULL) {
            $valeurs->setCA(0);
        } else {
            $valeurs->setCA($row['THT']);
        }
    }
}

