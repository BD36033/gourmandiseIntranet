<?php

class HistoriqueModele extends Modele
{

    private $parametre = []; //Tableau = $_REQUEST du fichier index

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getListeHistorique($etat)
    {
if ($etat !='*') {
    $ligneEtat = 'AND commande.etat = ? ';
    $ligneEtat = str_replace('?',$etat,$ligneEtat);
} else {
    $ligneEtat= '';
}
        $sql = "SELECT DISTINCT commande.numero,CONCAT(vendeur.nom,' ',vendeur.prenom) AS nomVendeur, commande.codec,client.nom AS nomClient,commande.total_ht AS totalHT
FROM commande, client,vendeur
WHERE commande.codec = client.codec AND vendeur.codev = commande.codev $ligneEtat ;
";
        $idRequete = $this->executeRequete($sql,); // requête simple

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeHistoriques[] = new HistoriqueTable($row);
            }

            return $listeHistoriques;
        } else {
            return null;
        }

    }

    public function getUnHistorique()
    {
//        var_dump($this->parametre['numero']);
//        die;
        $sql = "SELECT
    produit.reference,
    ligne_commande.numero_ligne AS numerodeligne,
    produit.designation,
    ligne_commande.quantite_demandee AS quantite,
    produit.prixUHT AS totalht,
    round(produit.prixUHT * 1.3, 2) AS prixdevente,
    round(ligne_commande.quantite_demandee * round(produit.prixUHT * 1.3, 2), 2) AS prixtotal
FROM
    ligne_commande
    INNER JOIN produit ON ligne_commande.reference = produit.reference
WHERE
    numero = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['numero']]); // requête préparée

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeHistoriques[] = new HistoriqueTable($row);
            }

            return $listeHistoriques;
        } else {
            return null;
        }
    }

    public function updateHistorique(HistoriqueTable $valeurs)
    {
        $sql = "UPDATE historique SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse(),
            $valeurs->getCp(),
            $valeurs->getVille(),
            $valeurs->getTelephone(),
            $valeurs->getCodec()
        ]);
        if ($idRequete) {
            HistoriqueTable::setMessageSucces("Modification du historique correctement effectué.");
        }
    }
}

