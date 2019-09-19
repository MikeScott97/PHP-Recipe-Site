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
                One of three columns
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

                <?php
                if (isset($_GET["q"])) {
                    $dsn = 'mysql:host=localhost;port=3306;dbname=recipesDB';
                    $username = 'michael';
                    $password ="Hellome11!";
                    $db = new PDO($dsn, $username, $password);

                    $stmt = $db->prepare("SELECT recipeName, Recipe.idRecipe, Recipe.cost FROM Recipe INNER JOIN lookupTable ON lookupTable.idRecipe = Recipe.idRecipe INNER JOIN Ingredients ON Ingredients.idIngredients = lookupTable.idIngredients WHERE Ingredients.ingredientName LIKE ? GROUP BY recipeName, idRecipe;");
                    $stmt->execute(["%".$_GET["q"]."%"]);

                    $query = $stmt->fetchAll();
                    foreach ($query as $row) {
                        echo("<a class=\"container btn\" href=\"/item.php?id={$row["idRecipe"]}\">
                                {$row["recipeName"]} : {$row["cost"]}
                              </a>");
                    }
                }
                ?>
            </div>
            <div class="col">
                One of three columns
            </div>
        </div>
    </div>
</body>
</html>
