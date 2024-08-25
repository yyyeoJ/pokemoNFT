<?php

session_start();



require_once "storage.php";

$storage = new Storage(new JsonIO("cards.json"));
$userStorage = new Storage(new JsonIO("users.json"));

if(isset($_SESSION["username"])){
    $user = $userStorage->findOne(["username" => $_SESSION["username"]]);
}


$sellCardId = trim($_POST["sellcard"] ?? "");


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($sellCardId)) {
    $card = $storage->findOne(["id" => $sellCardId]);

    $userStorage->update($user["id"], [
        "id" => $user["id"],
        "username" => $user["username"],
        "password" =>$user["password"],
        "email" => $user["email"],
        "money" => $user["money"] + round( $card["price"]*0.9 ),
        "admin" => false,

    ]);


    $storage->update($sellCardId, [
        "id" => $card["id"],
        "name" => $card["name"],
        "type" => $card["type"],
        "hp" => $card["hp"],
        "attack" => $card["attack"],
        "defense" => $card["defense"],
        "price" => $card["price"],
        "description" => $card["description"],
        "image" => $card["image"],
        "owner" => "admin"

    ]);

    header("Location: userdetails.php");


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | <?= $user["username"] ?></title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/details.css">
    <link rel="stylesheet" href="styles/cards.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> > <?= $user["username"] ?></h1>

        <div class="loginContainer">
                
                <?php if($user["admin"]): ?>
                    <h1><a href="newcard.php">New card</a></h1>
                <?php endif; ?>
                <h1><a href="logout.php">Log out</a></h1>
            </div>

    </header>
    <div id="content">
        <div id="details">
            <div class="info">
                <div>Username : <?= $user["username"] ?></div>
                <div>E-mail : <?= $user["email"] ?></div>
                <?php if($user["admin"]==false): ?>
                    <div>Balance : 💰 <?= $user["money"] ?></div>
                <?php endif; ?>
            </div>
        </div>
        <h2 style="display:flex;justify-content:center;">Cards owned:</h2>
        <div id="card-list">
            

            <?php foreach ($storage->findAll() as $card): ?>
                <?php if ($card["owner"] == $user["username"]): ?>
                    <div class="pokemon-card">
                        <div class="image clr-<?= $card["type"] ?>">
                            <img src="<?= $card["image"] ?>" alt="">
                        </div>
                        <div class="details">
                            <h2><a href="carddetails.php?id=<?= $card["id"] ?>"><?= $card["name"] ?></a></h2>
                            <span class="card-type"><span class="icon">🏷</span><?= $card["type"] ?> </span>
                            <span class="attributes">
                                <span class="card-hp"><span class="icon">❤</span><?= $card["hp"] ?> </span>
                                <span class="card-attack"><span class="icon">⚔</span><?= $card["attack"] ?> </span>
                                <span class="card-defense"><span class="icon">🛡</span><?= $card["defense"] ?> </span>
                            </span>
                        </div>
                        <div class="buy">
                            <span class="card-price"><span class="icon">💰</span> <?= $card["price"] ?></span>
                            <?php if(isset($_SESSION["username"]) && $user["admin"]==false): ?>
                                <form method="post" action="userdetails.php">
                                    <input type="hidden" id="sellcard" name="sellcard" value="<?= $card["id"] ?>">
                                    <button >Sell card</button>
                                </form>
                                
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>    
        </div>


    </div>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>
</html>