<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 09:59
 */
//$chaine = "I LIKE TO MOVE IT MOVE IT";
//var_dump($chaine);
//$chaine = explode(' ', $chaine);
//var_dump($chaine);
//$chaine = implode(' bloody ', $chaine);
//var_dump($chaine);

$champs = [
    'id',
    'nom',
    'oui'
];
$sql = "SELECT
". implode(",\n  ", $champs) . "
FROM `users`";
echo $sql;
