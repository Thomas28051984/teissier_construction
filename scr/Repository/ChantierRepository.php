<?php

class ChantierRepository
{

    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function insert(array $data): int
    {
//        phrase du dessous = appel la classe GestionSQL pour pouvoir utiliser les fonctions de celle ci
//        ne pas oublier que pour utiliser $this il faut mep construct et déclarer attribut(s)
        return $this->gestionSQL->insert("INSERT INTO chantier (`id_societe`, `adresse`, `code_postale`, `ville`) 
        VALUES (1, :adresse, :code_postale, :ville)", $data);
    }
}