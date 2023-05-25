<?php

class AvisRepository
{

    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function insertavis(array $message)
    {
//        phrase du dessous = appel la classe GestionSQL pour pouvoir utiliser les fonctions de celle-ci
//        ne pas oublier que pour utiliser $this il faut mep construct et déclarer attribut(s)
        return $this->gestionSQL->insert("INSERT INTO avis_client2 (`date_publication`, `avis`,`id_societe`) 
        VALUES ( :now, :avis, 1)");
    }

    public function limit(int $limit)
    {
        return $this->gestionSQL->findAll('SELECT * FROM avis_client2 limit'. $limit);
    }
}

