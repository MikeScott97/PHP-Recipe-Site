<?php
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" />
    <style>
        .nav {
            background-color: #8a57bd;
            color: white;
            height: 75px;
            border-style: solid;
            border: 0px;
            display: inline-block;
        }

        div .col {
            background-color: beige;
        }

        .row {
            height: 100%;
        }

        p {
            color: #8a57bd;
            font-size: 30px;
            font-family: sans-serif;
        }

        hr {
            border-color: lightgray;
        }
    </style>
</head>
<body>
    <nav class="nav container-fluid">
        <a href="/index.php" style="float: left; font-size: 30px; margin-left: 70px; margin-top: 7px;">
            Home
        </a>
        <?php if (isset($_SESSION["is_authenticated"])): ?>
        <a href="/logout.php" style="float: right; margin-right: 70px; margin-top: 7px; font-size: 30px;">
            Logout
        </a>
        <a href="/GroupProject.php" style="float: right; margin-right: 70px; margin-top: 7px; font-size: 30px;">
            Insert
        </a>
        <?php else: ?>
        <a href="/login.php" style="float: right; margin-right: 70px; margin-top: 7px; font-size: 30px;">
            Login
        </a> 
        <?php endif; ?>
    </nav>
</body>
</html>