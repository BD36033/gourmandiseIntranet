<?php

class ProduitModele extends Modele
{

    private $parametre = []; //Tableau = $_REQUEST du fichier index

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getListeProduit()
    {

        $sql = "SELECT * FROM produit";

        $idRequete = $this->executeRequete($sql); // requête simple

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {

                $listeProduits[] = new ProduitTable($row);
            }
            return $listeProduits;
        } else {
            return null;
        }
    }

    public function getUnProduit()
    {
        $sql = "SELECT * FROM produit WHERE reference  = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]); // requête préparée

        return new ProduitTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    public function addProduit(ProduitTable $valeurs)
    {
        $sql = "INSERT INTO produit (designation, quantite, descriptif, prixUHT, stock, poidsP) VALUES (?, ?, ?, ?, ?, ?)";

        $idRequete = $this->executeRequete($sql, [
            $valeurs->getDesignation(),
            $valeurs->getQuantite(),
            $valeurs->getDescriptif(),
            $valeurs->getPrixUHT(),
            $valeurs->getStock(),
            $valeurs->getPoidsP()
        ]);

        if ($idRequete) {

            ProduitTable::setMessageSucces("Création du produit correctement effectué.");
        }
    }

    public function deleteProduit(ProduitTable $valeurs)
    {
        $sql = "DELETE FROM produit where reference  = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getReference()
        ]);
        if ($idRequete) {
            ProduitTable::setMessageSucces("Suppression du produit correctement effectué.");
        }
    }

    public function updateProduit(ProduitTable $valeurs)
    {
        $sql = "UPDATE produit SET designation = ?, quantite = ?, descriptif = ?, prixUHT = ?, stock = ?, poidsP = ? WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getDesignation(),
            $valeurs->getQuantite(),
            $valeurs->getDescriptif(),
            $valeurs->getPrixUHT(),
            $valeurs->getStock(),
            $valeurs->getPoidsP(),
            $valeurs->getReference()
        ]);
        if ($idRequete) {
            ProduitTable::setMessageSucces("Modification du produit correctement effectué.");
        }
    }

    public function getPoids(ProduitTable $valeurs)
    {
        {
            $sql = "SELECT CASE WHEN descriptif = 'G' THEN prixUHT / (quantite / 1000) ELSE prixUHT / ((quantite * poidsP) /1000 ) END AS PrixKilo FROM produit WHERE reference=?;";
            $idRequete = $this->executeRequete($sql, [
                $valeurs->getReference()
            ]);
            $row = $idRequete->fetch(PDO::FETCH_ASSOC);
            if ($row['PrixKilo'] == NULL) {
                $valeurs->setPrixKilo(0);
            } else {
                $valeurs->setPrixKilo($row['PrixKilo']);
            }
        }

    }
}



