<?php
session_start();
?>
<!DOCTYPE html>
<!--Michael Scott-->
<html lang="en">
<meta charset="utf-8" />
<head>

</head>
<body>
   <?php require("./masterpage.php"); ?>
<div style="text-align:center; background-color:#D3D3D3;">
    <h1>Recipe Maker</h1>
    <form action="upload.php" method='post'>
    <table style="margin-left:auto; margin-right:auto">
    <tr>
        <th>Recipe Name:</th>
        <th><input type="text" name="recipeName" /></th>
    </tr>
    <tr>
        <th>Recipe Price:</th>
        <th><input type="number" name="recipeCost" step="0.01" /></th>
        </tr>
        </table>
    <div>
        <p>Recipe Steps</p>
        <textarea rows="5" cols="50" name="recipeSteps">
1.
2.
3.
4.
5.
        </textarea>
    </div>
    <div>
    <p>Ingredients <br />seperated by ( : )</p>
    <input type='text' name='ingredientName' />
    </div>
    <div>
        <input type="submit" value="Submit" name="submit" />
    </div>
    </form>
    </div>
</body>
</html>