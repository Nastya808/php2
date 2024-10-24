<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #e8db95, #d19f42);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 300px;
        }

        label {
            font-size: 1rem;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ff5f6d;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff4f5e;
        }

        p a {
            display: block;
            text-align: center;
            color: #fff;
            text-decoration: none;
            margin-top: 15px;
            font-size: 1rem;
            background-color: #32de84;
            padding: 10px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        p a:hover {
            background-color: #28c77f;
        }

        p {
            text-align: center;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        .message.success {
            color: #32de84;
        }

        .message.error {
            color: #ff4f5e;
        }
    </style>
</head>
<body>

<form action="adduser.php" method="POST">
    <h1>Add User</h1>

    <label for="login">Login:</label>
    <input type="text" id="login" name="login" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" name="submit" value="Add User">

    <p><a href="index.php">Go back to Home</a></p>

</form>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $userData = array(
        'login' => $login,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'email' => $email
    );

    function addUser($userData) {
        $usersFile = 'users.txt';

        if (!file_exists($usersFile)) {
            file_put_contents($usersFile, '');
        }

        $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($users as $user) {
            $userDetails = explode(':', $user);
            if ($userDetails[0] === $userData['login']) {
                echo "<p class='message error'>Error: User with this login already exists.</p>";
                return;
            }
        }

        $userLine = $userData['login'] . ':' . $userData['password'] . ':' . $userData['email'] . "\n";
        file_put_contents($usersFile, $userLine, FILE_APPEND);
        echo "<p class='message success'>User added successfully.</p>";
    }

    addUser($userData);
}
?>
</body>
</html>
