<?php

class AvisRepository
{

    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function insert(array $message)
    {
//        phrase du dessous = appel la classe GestionSQL pour pouvoir utiliser les fonctions de celle ci
//        ne pas oublier que pour utiliser $this il faut mep construct et déclarer attribut(s)
        return $this->gestionSQL->insert("INSERT INTO avis_client (`id`, `date_publication`, `message`,`id_societe`) 
        VALUES (NULL, :now, :message, 1)");
    }

    public function read_avis(array $avis)
    {
        return $this->gestionSQL->findAll('SELECT * FROM avis_client');
    }

    public function displayavis()
    {
        return $this->gestionSQL-findall('SELECT * FROM avis_client limit 2 order by desc');
    }
}

