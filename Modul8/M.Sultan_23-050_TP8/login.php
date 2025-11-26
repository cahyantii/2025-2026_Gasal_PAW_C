<?php
session_start();

// Kalau sudah login → langsung ke index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            width: 360px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #aaa;
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 20px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 8px;
        }
        button {
            width: 95%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>

    <?php if (isset($_GET['error'])) { ?>
        <p style="color:red;">Username atau Password salah!</p>
    <?php } ?>

    <form action="proses_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>