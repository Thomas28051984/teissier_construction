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
        return $this->gestionSQL->insert("INSERT INTO user (`id`, `nom`, `prenom`, `mail`, `password`, `societe_id`) 
        VALUES (NULL, :nom, :prenom, :mail, :password, 1)", $data);
    }
}
