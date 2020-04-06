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
    $query = 'SELECT user, hashed_password
           FROM users
           WHERE user= ?';
    $sth = $dbh->prepare($query);
    $sth->execute([$_POST['user']]);
    $authentification = $sth->fetch();

    var_dump($confirmation);

    if ($authentification !== false and password_verify($password, $authentification['hashed_password'])) {
        session_start();
        $_SESSION['authentification'] = $authentification['id'];

        header('Location:compte.php');
        exit;
    } else {
        header('Location:authentification.php');
        exit;
    }
}
include 'authentification.phtml';
