<?php
require_once "storage.php";
$errors = [];
$cardStorage = new Storage(new JsonIO("cards.json"));

$name = ""; 
$type = ""; 
$hp = ""; 
$attack = ""; 
$defense = ""; 
$price = ""; 
$description = ""; 
$image = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = trim($_POST["name"] ?? "");
    $type = trim($_POST["type"] ?? "");
    $hp = trim($_POST["hp"] ?? "");
    $attack = trim($_POST["attack"] ?? "");
    $defense = trim($_POST["defense"] ?? "");
    $price = trim($_POST["price"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $image = trim($_POST["image"] ?? "");


    
    if (strlen($name) == 0 || !is_string($name)){
        $errors["name"] = "You must enter a name!";
    }
    if ($type == "") {
        $errors["type"] = "You must select a type!";
    }
    if (strlen($hp) == 0) {
        $errors["hp"] = "You must enter an hp!";
    }
    if (strlen($attack) == 0) {
        $errors["attack"] = "You must enter an attack!";
    }
    if (strlen($defense) == 0) {
        $errors["defense"] = "You must enter a defense!";
    }
    if (strlen($price) == 0) {
        $errors["price"] = "You must enter a price!";
    }
    if (strlen($description) == 0) {
        $errors["description"] = "You must enter a description!";
    }
    if (strlen($image) == 0 || !filter_var($image, FILTER_VALIDATE_URL)) {
        $errors["image"] = "You must enter an image link!";
    }



    if (count($errors) == 0) {

        $cardId = $cardStorage->add([
            "name" => $name,
            "type" => $type,
            "hp" => $hp,
            "attack" => $attack,
            "defense" => $defense,
            "price" => $price,
            "description" => $description,
            "image" => $image,
            "owner" => $admin
        ]);
        header("Location: index.php");
        exit();
    }    
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | New card</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> > New card</h1>
    </header>
    <div id="content">
        
        
        <form method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= $name ?>">
            </div>
            
            <div>
                <label for="email">Type</label>
                <select name="type" id="type">
                    <option <?php echo ($type === "") ? "selected" : "";?>   disabled value=""> select type</option>
                    <option <?php echo ($type === "normal") ? "selected" : "";?> value ="normal">normal</option>
                    <option <?php echo ($type === "fire") ? "selected" : "";?> value ="fire">fire</option>
                    <option <?php echo ($type === "water") ? "selected" : "";?> value ="water">water</option>
                    <option <?php echo ($type === "electric") ? "selected" : "";?> value ="electric">electric</option>
                    <option <?php echo ($type === "grass") ? "selected" : "";?> value ="grass">grass</option>
                    <option <?php echo ($type === "ice") ? "selected" : "";?> value ="ice">ice</option>
                    <option <?php echo ($type === "fighting") ? "selected" : "";?> value ="fighting">fighting</option>
                    <option <?php echo ($type === "poison") ? "selected" : "";?> value ="poison">poison</option>
                    <option <?php echo ($type === "ground") ? "selected" : "";?> value ="ground">ground</option>
                    <option <?php echo ($type === "psychic") ? "selected" : "";?> value ="psychic">psychic</option>
                    <option <?php echo ($type === "bug") ? "selected" : "";?> value ="bug">bug</option>
                    <option <?php echo ($type === "rock") ? "selected" : "";?> value ="rock">rock</option>
                    <option <?php echo ($type === "ghost") ? "selected" : "";?> value ="ghost">ghost</option>
                    <option <?php echo ($type === "dark") ? "selected" : "";?> value ="dark">dark</option>
                    <option <?php echo ($type === "steel") ? "selected" : "";?> value ="steel">steel</option>
                    <option <?php echo ($type === "dragon") ? "selected" : "";?> value ="dragon">dragon</option>
                </select>
            </div>


            <div>
                <label for="hp">Hp:</label>
                <input min="1" type="number" name="hp" id="hp" value="<?= $hp ?>">
            </div>

            <div>
                <label for="attack">Attack:</label>
                <input min="1" type="number" name="attack" id="attack" value="<?= $attack ?>">
            </div>

            <div>
                <label for="defense">Defense:</label>
                <input min="1" type="number" name="defense" id="defense" value="<?= $defense ?>">
            </div>

            <div>
                <label for="price">Price:</label>
                <input min="0" type="number" name="price" id="price" value="<?= $price ?>">
            </div>

           
            <label for="description">Description:</label>
            <textarea name="description" id="description" ><?= $description ?></textarea>
           
            <div>
                <label for=image">Image link:</label>
                <input type="text" name="image" id="image" value="<?= $image ?>">
            </div>

            <div>
                <input type="submit" value="Create">
            </div>



        </form>

        <?php if(count($errors) !== 0): ?>
        <div id="errors">
            <h2>Error!</h2>
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>



    </div>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>
