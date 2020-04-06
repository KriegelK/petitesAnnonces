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

if (!empty($_POST)) {
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);
    $query = 'INSERT INTO users(user, hashed_password) VALUE(?,?)';
    $sth = $dbh->prepare($query);
    $sth->execute([$user, password_hash($password, PASSWORD_BCRYPT)]);
    header('Location:authentification.php');
    exit;
}
include 'inscription.phtml';