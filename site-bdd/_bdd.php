<?php
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=mysql8;dbname=mydb;charset=utf8', $user, $pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

function getFilm($id)
{
    global $db;
    $sql = "SELECT * FROM films WHERE id = :id";
    $request = $db->prepare($sql);
    $request->bindValue(':id', $id);
    $request->execute();
    $rows = $request->fetchAll();
    if (count($rows) > 0) {
        $film = $rows[0];
    }
    else {
        $film = null;
    }
    return $film;
}

function deleteFilm($id)
{
    global $db;
    $sql = "DELETE FROM films WHERE id = :id";
    $request = $db->prepare($sql);
    $request->bindValue(':id', $id);
    $request->execute();
}

function createFilm($film)
{
    global $db;
    $sql = "INSERT INTO films (titre, annee, duree, image) VALUE (:titre, :annee, :duree, :image)";
    $req = $db->prepare($sql);
    $req->bindValue(':titre', $film['titre']);
    $req->bindValue(':annee', $film['annee']);
    $req->bindValue(':duree', $film['duree']);
    $req->bindValue(':image', $film['image']);
    $req->execute();
    return $db->lastInsertId();
}

function updateFilm($id, $film)
{
    global $db;
    $sql = "UPDATE films
            SET titre = :titre, annee = :annee, duree = :duree, image = :image
            WHERE id = :id";
    $req = $db->prepare($sql);
    $req->bindValue(':id',    $id);
    $req->bindValue(':titre', $film['titre']);
    $req->bindValue(':annee', $film['annee']);
    $req->bindValue(':duree', $film['duree']);
    $req->bindValue(':image', $film['image']);
    $req->execute();
}

function listFilm($search = null)
{
    global $db;
    if ($search != null) {
        $sql = "SELECT * FROM films WHERE titre like :search";
        $request = $db->prepare($sql);
        $request->bindValue(':search', '%' . $_POST['search'] . '%');
    }
    else {
        $sql = "SELECT * FROM films";
        $request = $db->prepare($sql);
    }
    $request->execute();
    $films = $request->fetchAll();
    return $films;
}
