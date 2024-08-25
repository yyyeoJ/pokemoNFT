<?php
require_once "storage.php";
$errors = [];
$userStorage = new Storage(new JsonIO("users.json"));

$username ="";
$email ="";
$password ="";
$password2 ="";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $password2 = trim($_POST["password2"] ?? "");

    if (strlen($username) == 0) {
        $errors["username"] = "You must enter your username!";
    }

    if (strlen($email) === 0) {
        $errors["email"] = "You must enter your email address!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "The format is incorrect!";
    }

    if (strlen($password) === 0) {
        $errors["password"] = "You must enter your password!";
    }elseif(strlen($password2) === 0){
        $errors["password"] = "You must confirm your password!";
    }elseif($password != $password2){
        $errors["password"] = "The passwords are not identical!";
    }


    if (count($errors) == 0) {
        $existingUsername = $userStorage->findOne(["username" => $username]);
        $existingEmail = $userStorage->findOne(["email" => $email]);

        if (!$existingUsername && !$existingEmail) {
            $userId = $userStorage->add([
                "username" => $username,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT), 
                "money" => 500,
                "admin" => false,

            ]);

            header("Location: login.php");
            exit();
        } else {
            if($existingUsername){
                $errors["username"] = "Username already taken!";
            }
            if($existingEmail){
                $errors["email"] = "There is already an account with this email!";
            }
            
        }
    }    
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKémon | Register</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <header>
        <h1><a href="index.php">IKémon</a> > Register</h1>
    </header>
    <div id="content">
        
        
        <form method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $username ?>">
            </div>
            
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $email ?>">
            </div>


            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?= $password ?>">
            </div>

            <div>
                <label for="password2">Confirm password</label>
                <input type="password" name="password2" id="password2" value="<?= $password2 ?>">
            </div>

            <input type="submit" value="Register">
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
