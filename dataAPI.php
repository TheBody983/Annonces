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

// stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $infoOffre ){
        $offreListe[$infoOffre->fields->coderome]=$infoOffre->fields->titreoffre;
    }
    return $offreListe;
}
?>