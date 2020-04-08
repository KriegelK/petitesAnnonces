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

//recup informations for announcement in BDD
$query = 'SELECT id, title, image, content, publication_date
          FROM announcements';
$sth = $dbh->query($query);
$announcements = $sth->fetchAll();

//delete announcement
$query = ' DELETE FROM announcements';
$sth = $dbh->prepare($query);
$sth ->execute([]);

include 'compte.phtml';