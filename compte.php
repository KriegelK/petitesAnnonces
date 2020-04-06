<?php
$dbh = new PDO(
    'mysql:host=localhost;dbname=annonces;charset=utf8',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);
//var_dump($dbh);

$query= 'SELECT id, title, image, content, publication_date
         FROM announcements';
$sth = $dbh -> query($query);
$announcements = $sth -> fetchAll();

//delete announcement
$delete = $bdd->prepare('DELETE title
                         FROM announcements');
$delete->execute($bdd);

include 'compte.phtml';