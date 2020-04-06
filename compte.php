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

$query= 'SELECT id, title, image ,content
         FROM announcements';
$sth = $dbh -> query($query);
$announcements = $sth -> fetchAll();

include 'compte.phtml';