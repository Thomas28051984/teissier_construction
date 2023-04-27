<?php

class ClientRepository
{

    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function insert(array $data)
    {
//        phrase du dessous = appel la classe GestionSQL pour pouvoir utiliser les fonctions de celle ci
//        ne pas oublier que pour utiliser $this il faut mep construct et déclarer attribut(s)
        return $this->gestionSQL->insert("INSERT INTO client (`id`, `nom`, `prenom`, `mail`, `password`, `id_societe`, `id_avis_client`, `id_role`) 
        VALUES (NULL, :nom, :prenom, :mail, :password, 1, NULL, 1)", $data);
    }
}
