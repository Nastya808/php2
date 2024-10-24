<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Users</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #e8db95, #d19f42);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            flex-direction: column;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        table, th, td {
            border: 1px solid #fff;
        }

        th, td {
            padding: 12px;
            font-size: 1.2rem;
        }

        th {
            background-color: #ec8632;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        tr:nth-child(odd) {
            background-color: rgba(255, 255, 255, 0.05);
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

<h1>Registered Users</h1>

<?php
$usersFile = 'users.txt';

if (file_exists($usersFile)) {
    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (count($users) > 0) {
        echo "<table>";
        echo "<tr><th>Login</th><th>Password (Hashed)</th><th>Email</th></tr>";

        foreach ($users as $user) {
            list($login, $password, $email) = explode(':', $user);
            echo "<tr><td>$login</td><td>$password</td><td>$email</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
    }
} else {
    echo "<p>No users found.</p>";
}
?>

<p><a href="index.php">Go back to Home</a></p>

</body>
</html>
