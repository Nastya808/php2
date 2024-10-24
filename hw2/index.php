<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 1px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #ff6b6b;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
            margin: 10px;
            display: inline-block;
        }

        a:hover {
            background-color: #ff5252;
        }

        p {
            margin-top: 30px;
            font-size: 1.5rem;
        }

        .counter {
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: inline-block;
        }
    </style>
</head>
<body>

<div>
    <h1>User Menu</h1>
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="adduser.php">Add User</a></li>
        <li><a href="showusers.php">Show Users</a></li>
    </ul>

    <?php
    $usersFile = 'users.txt';
    echo '<div class="counter">';
    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo "<p>Current number of users: " . count($users) . "</p>";
    } else {
        echo "<p>No users found.</p>";
    }
    echo '</div>';
    ?>
</div>

</body>
</html>
