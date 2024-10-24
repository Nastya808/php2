<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #e8db95, #d19f42);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        input {
            display: block;
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        input[type="text"], input[type="password"] {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .message {
            margin-top: 20px;
            font-size: 1.2rem;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #28c77f;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
        }

        a:hover {
            background-color: #28c77f;
        }

        p {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<form action="login.php" method="POST">

    <h2>User Login</h2>

    <input type="text" name="login" placeholder="Enter login" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="submit" value="Login">

    <p><a href="index.php">Go back to Home</a></p>

</form>

<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    function authenticateUser($login, $password) {
        $usersFile = 'users.txt';

        if (!file_exists($usersFile)) {
            return false;
        }

        $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user) {
            list($storedLogin, $storedPasswordHash, $email) = explode(':', $user);

            if ($storedLogin === $login && password_verify($password, $storedPasswordHash)) {
                return true;
            }
        }

        return false;
    }

    if (authenticateUser($login, $password)) {
        $message = "<p style='color: lightgreen;'>Access granted. Welcome, $login!</p>";
    } else {
        $message = "<p style='color: red;'>Access denied. Invalid login or password.</p>";
    }
}
?>

<div class="message"><?php echo $message; ?></div>

</body>
</html>
