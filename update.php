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

//Update announcement
session_start();
// Vérifie si le rédacteur est connecté
if (!array_key_exists('authentification', $_SESSION)) {
    // Redirection vers la page de connexion
    header('Location: Authentification.php');
    exit;
} else {
    if (array_key_exists('id', $_GET) and intval($_GET['id']) > 0) {
        $query = 'UPDATE FROM announcements
                  WHERE id = :id';
        $sth = $dbh->prepare($query);
        $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        //$sth->execute('id');
    }
    //header('Location:compte.php');
    //exit;
}
include 'update-announcement.phtml';