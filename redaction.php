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

//var_dump($_FILES);

//Inserer un fichier
if (array_key_exists('fichier', $_FILES)) {
    if ($_FILES['fichier']['error'] === 0) {
        if (in_array(mime_content_type($_FILES['fichier']['tmp_name']), ['image/png', 'image/jpeg'])) {
            if ($_FILES['fichier']['size'] < 3000000) {
                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . uniqid() . '.' . pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION));
            }
        }
    }
}

//Entrer informations dans BDD
if (!empty($_POST)) {
    $title = $_POST['title'];
    $image = $_FILES['fichier'];
    $content = $_POST['content'];
    $query = 'INSERT INTO announcements(title, image, content) VALUE(?,?,?)';
    $sth = $dbh->prepare($query);
    $sth->execute([$title, $image, $content]);
    header('Location:compte.php');
    exit;
};

if (!empty($_POST)) {
    $query= 'SELECT id
             FROM users
             INNER JOIN announcements ON announcement.id = announcements.idUser';
    $sth = $dbh -> prepare($query);
    $sth->bindValue($_GET['id'], PDO::PARAM_INT);
    $sth->execute([$announcements]);
    $posts= $sth->fetch();
    //var_dump($announcements);
    };

include 'redaction.phtml';