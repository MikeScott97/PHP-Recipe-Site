<?php 
$dsn = 'mysql:host=localhost;port=3306;dbname=recipesDB';
$username = 'michael';
$password ="Hellome11!";

$inArr = explode(':', $_POST['ingredientName']);
try{
    $db = new PDO ($dsn, $username, $password);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //this insert the recipe data into the recipe table
    $query = $db->prepare("INSERT INTO Recipe (recipeName, cost, steps) VALUES (?, ?, ?)");
    $query->execute([$_POST['recipeName'], $_POST['recipeCost'], $_POST['recipeSteps']]);
    //this grabs the recipe id from the recipe table
    $grabRecipeID = $db->prepare("SELECT idRecipe FROM Recipe WHERE recipeName LIKE ?");
    $grabRecipeID->execute([$_POST['recipeName']]);
    $recipeID = $grabRecipeID->fetch();

    //prepares 3 statements
    //inputs 1 ingredient into the db
    $query = $db->prepare("INSERT INTO Ingredients (ingredientName) VALUES (?)");
    //grabs the ingredients id
    $grabID = $db->prepare("SELECT idIngredients FROM Ingredients WHERE ingredientName LIKE ?");
    //inputs the id of both the recipe and the newly inserted ingredient into the lookup table
    $lookupTable = $db->prepare("INSERT INTO lookupTable (idRecipe, idIngredients) VALUES (?, ?)");

    //this loops through the ingredient array from the input form
    foreach($inArr as $ingredient){
        $grabID->execute([$ingredient]);
        $countRows = $grabID->fetchAll();
        //if false add ingredient to database
        if(count($countRows) == 0){
            $query->execute([$ingredient]);
            $grabID->execute([$ingredient]);
            $arrIngredient = $grabID->fetch();
        }else{
            $arrIngredient = $countRows[0];
        }
        $lookupTable->execute([$recipeID[0], $arrIngredient[0]]);  
    }
    header("Location: GroupProject.php", true, 301);
    exit();
}
catch(PDOException $e){
echo $query . "<br />" . $e->getMessage();
}
?>