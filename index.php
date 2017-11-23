<?php 
echo('Bonjour'); 


try
{
    // On se connecte à MySQL
    $pdo = new PDO('pgsql:host=ec2-46-137-174-67.eu-west-1.compute.amazonaws.com;dbname=de8uvfserneqgu;', 'qdvsqfgjvjobfx', 'b4d817b0fd17040988aeff318385ef1d44ed81d8b19fa0e38e2d49506ed792b1');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$query = 'INSERT INTO test (test_name, test_firstname) VALUES (?, ?);';
$prep = $pdo->prepare($query);
 
$prep->bindValue(1, 'bertrand', PDO::PARAM_STR);
$prep->bindValue(2, 'berkill1234', PDO::PARAM_STR);
$prep->execute();
$resultat = $pdo->query('SELECT * FROM categories');
while ($donnees = $resultat->fetch())
{
  echo '<br/>';
  echo $donnees['nom'];
  echo ' : ';
  echo $donnees['description'];
}

?>
