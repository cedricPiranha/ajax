<?php
include('connexion.php');


$requete = $pdo->query('
SELECT * FROM villes V
INNER JOIN departements D ON V.departementsId = D.id
WHERE V.departementsId = '.$_POST['departement'].' order by V.VilleNom asc');
$villes = $requete->fetchAll();

$array = array();

$array['mensualites'] = 1000;
$array['historiques'] = $villes;

$test = json_encode($array);
echo $test;










/*$chaine = '';

$requete = $pdo->query('
SELECT * FROM villes V
INNER JOIN departements D ON V.departementsId = D.id
WHERE V.departementsId = '.$_POST['departement'].' order by V.VilleNom asc');
$villes = $requete->fetchAll();

foreach($villes as $res)
{
  $chaine .= '<option value="'.$res['id'].'">'.$res['VilleNom'].' '.$res['code'].'</option>';
}
*/




?>