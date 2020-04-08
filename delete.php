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

//Delete announcements
$query = 'DELETE FROM announcements
           WHERE id= ?';
$sth = $dbh->prepare($query);
$sth -> bindValue('id', PDO::PARAM_INT);
$sth ->execute([$query]);

header('Location:compte.php');
exit;