<?php

class ClientModele extends Modele
{

    private $parametre = []; //Tableau = $_REQUEST du fichier index

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

    }

    public function getListeClient()
    {

        $sql = "SELECT * FROM client";

        $idRequete = $this->executeRequete($sql); // requête simple

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {

                $listeClients[] = new ClientTable($row);
            }
            return $listeClients;
        } else {
            return null;
        }

    }

    public function getUnClient()
    {
        $sql = "SELECT * FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]); // requête préparée

        return new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    public function addClient(ClientTable $valeurs)
    {
        $sql = "INSERT INTO client (nom, adresse, cp, ville, telephone) VALUES (?, ?, ?, ?, ?)";

        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse(),
            $valeurs->getCp(),
            $valeurs->getVille(),
            $valeurs->getTelephone()
        ]);

        if ($idRequete) {

            ClientTable::setMessageSucces("Création du client correctement effectué.");
        }
    }

    public function deleteClient(ClientTable $valeurs)
    {
        $sql = "DELETE FROM client where codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getCodec()
        ]);
        if ($idRequete) {
            ClientTable::setMessageSucces("Suppression du client correctement effectué.");
        }
    }

    public function verifieCommande(ClientTable $valeurs)
    {
        $sql = "select * from commande where codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getCodec()
        ]);

        $rowCount = $idRequete->rowCount();

        if ($rowCount > 0) {
            ClientTable::setMessageErreur("Suppression du client impossible car ce client posséde une commande");
            return false;
        }
        return true;
    }

    public function updateClient(ClientTable $valeurs)
    {
        $sql = "UPDATE client SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse(),
            $valeurs->getCp(),
            $valeurs->getVille(),
            $valeurs->getTelephone(),
            $valeurs->getCodec()
        ]);
        if ($idRequete) {
            ClientTable::setMessageSucces("Modification du client correctement effectué.");
        }
    }

    public function getCAclient(ClientTable $valeurs)
    {
        {
            $sql = "SELECT SUM(total_ht) AS CAclient FROM commande WHERE codec = ?;";
            $idRequete = $this->executeRequete($sql, [
                $valeurs->getCodec()
            ]);
            $row = $idRequete->fetch(PDO::FETCH_ASSOC);
            if ($row['CAclient'] == NULL) {
                $valeurs->setCAclient(0);
            } else {
                $valeurs->setCAclient($row['CAclient']);
            }
        }
    }

    public function getCApourcentage(ClientTable $valeurs)
    {
        $sql = "SELECT codec, total_ht, round((total_ht / (SELECT SUM(total_ht) FROM commande)) * 100 ,2) AS pourcentage FROM commande WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$valeurs->getCodec()]);

        if ($idRequete->rowCount() > 0) {
            $row = $idRequete->fetch(PDO::FETCH_ASSOC);
            if (is_array($row)) {
                if ($row['pourcentage'] === NULL) {
                    $valeurs->setCAtotal(0);
                } else {
                    $valeurs->setCAtotal($row['pourcentage']);
                }
            }
        } else {
            $valeurs->setCAtotal(0);
        }
    }

    public function getArticlesPopulaire(ClientTable $valeurs)
    {
        $sql = "SELECT produit.designation, commande.codec, ligne_commande.numero, ligne_commande.reference, SUM(ligne_commande.quantite_demandee) AS total_quantite
        FROM commande
        JOIN ligne_commande ON commande.numero = ligne_commande.numero
        JOIN produit ON ligne_commande.reference = produit.reference
        WHERE commande.codec = ?
        GROUP BY produit.reference, commande.numero, commande.codec, ligne_commande.numero, ligne_commande.reference
        ORDER BY total_quantite DESC
        LIMIT 4";

        $idRequete = $this->executeRequete($sql, [$valeurs->getCodec()]);

        $articlesPopulaires = []; // Tableau pour stocker les résultats

        while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            $article = [
                'designation' => $row['designation'],
                'total_quantite' => $row['total_quantite']
            ];
            $articlesPopulaires[] = $article;
        }

        if (count($articlesPopulaires) > 0) {
            $valeurs->setArticlePop($articlesPopulaires);
        } else {
            $valeurs->setArticlePop([]);
        }
    }
}

