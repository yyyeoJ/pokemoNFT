<?php

session_start();



require_once "storage.php";


if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$storage = new Storage(new JsonIO("cards.json"));
$userStorage = new Storage(new JsonIO("users.json"));
$card = $storage->findById($_GET["id"]);

if (!$card) {
    header("Location: index.php");
    exit();
}

if(isset($_SESSION["username"])){
    $user = $userStorage->findOne(["username" => $_SESSION["username"]]);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | <?= $card["name"] ?></title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <header class="clr-<?= $card["type"] ?>">
        <h1><a href="index.php">IKémon</a> > <?= $card["name"] ?></h1>

        <?php if(!isset($_SESSION["username"])): ?>
            <div class="loginContainer">
                <h1><a href="login.php">Login</a></h1>
                <h1><a href="register.php">Register</a></h1>
            </div>
        <?php else: ?>
            <div class="loginContainer">
                <h1><a href="userdetails.php"><?= $user["username"] ?></a></h1>
                <?php if($user["admin"]): ?>
                    <h1><a href="newcard.php">New card</a></h1>
                <?php else: ?>
                    <h1>💰 <?= $user["money"] ?></h1>
                <?php endif; ?>
                <h1><a href="logout.php">Log out</a></h1>
            </div>
        <?php endif; ?>



    </header>
    <div id="content">
        <div id="details">
            <div class="image clr-<?= $card["type"] ?>">
                <img src="<?= $card["image"] ?>" alt="">
            </div>
            <div class="info">
                <div class="description"><?= $card["description"] ?></div>
                <span class="card-type"><span class="icon">🏷</span> Type: <?= $card["type"] ?></span>
                <div class="attributes">
                    <div class="card-hp"><span class="icon">❤</span> Health: <?= $card["hp"] ?></div>
                    <div class="card-attack"><span class="icon">⚔</span> Attack: <?= $card["attack"] ?></div>
                    <div class="card-defense"><span class="icon">🛡</span> Defense: <?= $card["defense"] ?></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="clr-<?= $card["type"] ?>">
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>
</html>