
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Next Marvel Film </title>
</head>
<body>
<?php
#Inicializar una nueva sesion de curl para llamar la api
const API_URL = 'https://whenisthenextmcufilm.com/api';
$ch = curl_init(API_URL); 

#Iniciar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

#Ejecutar la peticion y guardamos el resultado
$result = curl_exec($ch);

$data = json_decode($result,true); #Convertir los datos a un array asociativo


curl_close($ch); #Cerramos la conexión


// var_dump($data); #ver el resultado de la peticion y guardamos en $data
?>
<main>
   
    <section> 
        <img src="<?=  $data["poster_url"];   ?>"  width="300" style="border-radius: 10px"     alt="Poster de <?= $data["title"]; ?>"  >

    </section>

    <hgroup> 
        <h2><?= $data["title"]; ?> Se estrena en <?= $data["days_until"];   ?> dias </h2>
        <h3>Fecha de estreno <?= $data[ "release_date"]; ?> </h3>
        <p> La siguiente pelicula es <?= $data["following_production"]["title"]; ?>  </p>
    </hgroup>
</main>





</body>
</html>