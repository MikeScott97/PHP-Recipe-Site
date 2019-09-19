<?php
session_start();
?>
<html>
<head>
    
</head>
<body>
    <?php require("./masterpage.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-6" style="background-color: white; text-align:center;">
                <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5IlQXtzAMBtZ6kPAgU9Otmw0SXTJjsOkFluvOA7ZpV_eMQ3Qs' />
                <br />
                <?php
                if (isset($_GET["id"])) {

                    require config.php;
                    $db = new PDO($dsnRecipe, $username, $password);

                    $stmt = $db->prepare("SELECT recipeName, steps, cost FROM Recipe WHERE idRecipe = ?");
                    $stmt->execute([$_GET["id"]]);
                    if ($query = $stmt->fetch()) {
                        echo("{$query["recipeName"]} <br /> {$query["steps"]} <br /> {$query["cost"]}

                        ");
                    }
                } else {
                    echo("404 Not found");
                }
                ?>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</body>
</html>
