<?php session_start(); ?>

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
        <a style="float: left; font-size: 30px; margin-left: 70px; margin-top: 7px;">
            Home
        </a>
        <?php if ($_SESSION["is_authenticated"]): ?>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-6" style="background-color: white;">
                <!-- Search Bar -->
                <form method="get" action="/search.php">
                    <div class="input-group input-group-lg mb-3" style="margin-top: 75px; padding-left: 20px; padding-right: 20px;">
                        <input type="text" name="q" class="form-control" placeholder="Start typing your favorite ingredient" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <hr />
                <!-- Search Bar End-->       
                <div class="text-center container">
                    <p>Welcome to the start of your meal</p>
                    <p>With us, you can find new experiences</p>
                    <p>And enjoy good food</p>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>
</body>
</html>
