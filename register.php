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
        $pays[$infopays->fields->libcog] = $infopays->fields->libenr;
    }
    return $pays;
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
?>

<html lang="fr">
<head>
    <title>Créer un compte</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<form method="post" action="annonces.php">
    <label for="name"> Nom </label> :
    <input type="text" name="name" id="name"/>
    <br />
    <label for="surname"> Prenom </label> :
    <input type="text" name="surname" id="surname"/>
    <br />
    <label for="mail"> Mail </label> :
    <input type="text" name="mail" id="mail"/>
    <br />
    <label for="country">Pays</label>
    <select name="country" id="country">
    <?php
    $pays = pays('');
    foreach( $pays as $complet => $nom ){
        echo '<option value = "'.$nom.'">'.$complet.'</option>';
    }
    ?>
    </select>

    <br />

    <label for="citySelect">Ville</label>
    <select name="city" id="citySelect">
    <?php
    $villesNC = cityNC('');
    foreach( $villesNC as $nom => $cp ){
        echo '<option value = "'.$nom.'">'.$cp.' - '.$nom.'</option>';
    }
    ?>
    </select>

    <br />
    <label for="idlogin"> Votre identifiant </label> :
    <input type="text" name="login" id="idlogin"/>
    <br />
    <label for="idpassword"> Votre mot de passe </label> :
    <input type="password" name="password" id="idpassword" />
    <br />
    <input type="submit" value="Envoyer"/>
</form>
<a href="index.php"> Annuler </a>
</body>
</html>