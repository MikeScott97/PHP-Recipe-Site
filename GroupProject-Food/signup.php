 <?php 

//write php here
require('password.php');

$db_user = 'michael';
$db_pass = 'Hellome11!';
$errors = array();
  // ----------------------------------------------------------------------- //

$dsn = "mysql:hostname=localhost;port=3306;dbname=loginDB";
  
  // Create a database object
$db = new PDO($dsn, $db_user, $db_pass);

if (isset($_POST['submit']))
{ 
     $first_name = $_POST["Fname"];
     $inEmail = $_POST["email"];
     $last_name = $_POST["Lname"];
     $inPassword = $_POST["password"];

     if (strlen($inEmail) <= 0) {
         echo "Must enter a valid email";
         return;
     } else if (strlen($inPassword) <= 0) {
         echo "Must enter a valid password";
         return;
     }

     $stmt = $db->prepare("SELECT * FROM login WHERE idlogin = ?");
     $stmt->execute([$_POST["email"]]);

     if (count($stmt->fetchAll()) > 0) {
         echo "A user has already signed up with that email";
         return;
     }
 
     $encryptPassword = password_hash($inPassword, PASSWORD_BCRYPT);
 
     $stmt = $db->prepare("INSERT INTO login(idlogin, passwordHash) VALUES(?, ?)"); 
     if ($stmt->execute([$inEmail, $encryptPassword])) {
         echo "Successful";
         header("Location: login.php", true, 301);
     } else {
         echo "Failure occured";
     }
}


 ?>
 
 
<html>
<head>
<meta charset="utf-8">
<title>User Registration page</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php require("./masterpage.php"); ?>
<table bgcolor="#f2f2f2" style="padding:50px" align="center" width="550px">
<form action="" method="POST">
<tr><td align="center" colspan="2"> <h1>Registration Page</h1> </td></tr>
<tr>
<td> First Name : </td><td><input type="text" name="Fname"></td>
</tr>
<tr>
<td> Last Name : </td><td><input type="text" name="Lname"></td>
</tr>
<tr>
<td> Email : </td><td><input type="email" name="email"></td>
</tr>
<tr>
<td> Password : </td><td><input type="password" name="password"></td>
</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="submit"></td> </tr>
<td align="center" colspan="2"><a href="login.php"><button type="button">Click Here To Login</button></a></td></tr>

</form>
</table>



</body>
</html>