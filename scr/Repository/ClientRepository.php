<?php

class ClientRepository
{

    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function insert(array $data): int
    {
//        phrase du dessous = appel la classe GestionSQL pour pouvoir utiliser les fonctions de celle-ci
//        ne pas oublier que pour utiliser $this il faut mep construct et déclarer attribut(s)
        return $this->gestionSQL->insert("INSERT INTO client (`nom`, `prenom`, `mail`, `password`, `id_societe`, `id_role`) 
        VALUES (:nom, :prenom, :mail, :password, 1 , 1)", $data);
    }

    public function findUserByMail(string $data)
    {
        return $this->gestionSQL->find("SELECT * FROM client WHERE mail = ?");
    }
