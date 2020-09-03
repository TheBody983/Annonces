<?php

function pays($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url . '?dataset=liste-des-pays-et-territoires-etrangers&q=' . urlencode($name) . '&rows=1000';

    // initialisation d'une session
    $curl = curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);

    // stockage des villes et des codes postaux dans un tableau associatif
    foreach ($response->records as $infopays) {
        $liste[$infopays->fields->libcog] = $infopays->fields->libenr;
    }
    natsort($liste);
    return $liste;
}

function cityNC($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=communes-nc&q='. urlencode($name).'&rows=100';

// initialisation d'une session
    $curl = curl_init($request_url);

// spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

// envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

// fermeture de la session
    curl_close($curl);

// stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $infoville ){
        $villes[$infoville->fields->nom_minus]=$infoville->fields->code_post;
    }
    natsort($villes);
    return $villes;
}

function offres($name)
{
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=offres-demploi&q='. urlencode($name).'&rows=50';

    // initialisation d'une session
    $curl = curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);
    if($response)
    // stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $infoOffre ){
        $offreListe[$infoOffre->fields->coderome]=$infoOffre->fields->titreoffre;
    }
    else $offreListe = NULL;
    return $offreListe;
}

function get_offre($id){
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url = $url .'?dataset=offres-demploi&q='. urlencode($id).'&rows=1';

    // initialisation d'une session
    $curl = curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response = json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);

    // stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $offre ){
        $res["code"]=$offre->fields->coderome;
        $res["titre"]=$offre->fields->titreoffre;
        $res["type"]=$offre->fields->typecontrat;
        $res["commune"]=$offre->fields->communeemploi;
        $res["formation"]=$offre->fields->niveauformation;
        $res["experience"]=$offre->fields->experience;
        $res["diplome"]=$offre->fields->diplome;
        $res["contact_mail"]=$offre->fields->contact_mail;
        $res["contact_telephone"]=$offre->fields->contact_telephone;
        $res["contact_identite"]=$offre->fields->contact_identite;
        $res["competences"]=$offre->fields->competences_multivalue;
        $res["activite "]=$offre->fields->activites_multivalue;
    }
    //coderome titreoffre typecontract communeemploi niveauformation experience diplome contact_mail contact_telephone contact_identite
    return $res;
}
?>