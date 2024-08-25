<?php
require_once "storage.php";
session_start();

$userStorage = new Storage(new JsonIO("users.json"));
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (strlen($username) == 0) {
        $errors["username"] = "You must enter your username!";
    }
    if (strlen($password) === 0) {
        $errors["password"] = "You must enter your password!";
    }

    if (count($errors) == 0) {
      
        $user = $userStorage->findOne(["username" => $username]);

        if ($user &&  password_verify($password,$user["password"])) {
            
            $_SESSION["username"] = $user["username"];
            header("Location: index.php");
        } else {
            $errors["invalid"] = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Login</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <header>
    <h1><a href="index.php">IKémon</a> > Login</h1>
    </header>
    <div id="content">
        <form method="post" action="login.php">


            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>


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

            

            <button type="submit">Login</button>
        </form>
    </div>
    <footer>
        <p>IKémon | ELTE IK Webprogramozás</p>
    </footer>
</body>

</html>