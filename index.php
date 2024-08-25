<?php

session_start();

require_once "storage.php";

$storage = new Storage(new JsonIO("cards.json"));
$userStorage = new Storage(new JsonIO("users.json"));

$filter = trim($_POST["type"] ?? "");

$cardsOwned = 0;

if(isset($_SESSION["username"])){
    $user = $userStorage->findOne(["username" => $_SESSION["username"]]);
    foreach ($storage->findAll() as $card){
        if($card["owner"] == $user["username"]){
            $cardsOwned += 1;
        }
    }
}


$buyCardId = trim($_POST["buycard"] ?? "");

if ($_SERVER["REQUEST_METHOD"] === "POST" && $buyCardId!="") {
    
    $card = $storage->findOne(["id" => $buyCardId]);

    if($user["money"] >= $card["price"] && $cardsOwned < 5){

        $userStorage->update($user["id"], [
            "id" => $user["id"],
            "username" => $user["username"],
            "password" =>$user["password"],
            "email" => $user["email"],
            "money" => $user["money"] - $card["price"],
            "admin" => false,
    
        ]);


        $storage->update($buyCardId, [
            "id" => $card["id"],
            "name" => $card["name"],
            "type" => $card["type"],
            "hp" => $card["hp"],
            "attack" => $card["attack"],
            "defense" => $card["defense"],
            "price" => $card["price"],
            "description" => $card["description"],
            "image" => $card["image"],
            "owner" => $user["username"]
    
        ]);

        header("Location: index.php"); 
    }

}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Home</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/cards.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> > Home</h1>

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

        <div class="filter">

            <h2>Filter by type:</h2>
            <form method="post" action="index.php">
                <select select name="type" id="type">
                    <option <?php echo ($filter === "") ? "selected" : "";?> disabled value=""> select type</option>
                    <option <?php echo ($filter === "all") ? "selected" : "";?> value ="all">all</option>
                    <option <?php echo ($filter === "normal") ? "selected" : "";?> value ="normal">normal</option>
                    <option <?php echo ($filter === "fire") ? "selected" : "";?> value ="fire">fire</option>
                    <option <?php echo ($filter === "water") ? "selected" : "";?> value ="water">water</option>
                    <option <?php echo ($filter === "electric") ? "selected" : "";?> value ="electric">electric</option>
                    <option <?php echo ($filter === "grass") ? "selected" : "";?> value ="grass">grass</option>
                    <option <?php echo ($filter === "ice") ? "selected" : "";?> value ="ice">ice</option>
                    <option <?php echo ($filter === "fighting") ? "selected" : "";?> value ="fighting">fighting</option>
                    <option <?php echo ($filter === "poison") ? "selected" : "";?> value ="poison">poison</option>
                    <option <?php echo ($filter === "ground") ? "selected" : "";?> value ="ground">ground</option>
                    <option <?php echo ($filter === "psychic") ? "selected" : "";?> value ="psychic">psychic</option>
                    <option <?php echo ($filter === "bug") ? "selected" : "";?> value ="bug">bug</option>
                    <option <?php echo ($filter === "rock") ? "selected" : "";?> value ="rock">rock</option>
                    <option <?php echo ($filter === "ghost") ? "selected" : "";?> value ="ghost">ghost</option>
                    <option <?php echo ($filter === "dark") ? "selected" : "";?> value ="dark">dark</option>
                    <option <?php echo ($filter === "steel") ? "selected" : "";?> value ="steel">steel</option>
                    <option <?php echo ($filter === "dragon") ? "selected" : "";?> value ="dragon">dragon</option>
                </select>
                <button type="submit">Apply Filter</button>
            </form>
        
        </div>
        



        <div id="card-list">

            <?php foreach ($storage->findAll() as $card): ?>
                <?php if ($filter == "" || $card["type"] == $filter || $filter == "all"): ?>
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
                                <form method="post" action="index.php">
                                    <input type="hidden" id="buycard" name="buycard" value="<?= $card["id"] ?>">
                                    <button class="<?= ($user["money"]>=$card["price"] && $user["username"] != $card["owner"] && $cardsOwned < 5) ? "" : "disabled"; ?>" type="submit"> <?= ($user["username"] == $card["owner"]) ? "Owned" : "Buy card"; ?> </button>
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