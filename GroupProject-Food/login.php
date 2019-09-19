<?php 
require('password.php');
//write php here
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

  $db_user = 'michael';
  $db_pass = 'Hellome11!';

  // ----------------------------------------------------------------------- //

  $dsn = "mysql:hostname=localhost;port=3306;dbname=loginDB";
  
  

$db = new PDO($dsn, $db_user, $db_pass);

$errors = array();
if (isset($_POST['email']) && isset($_POST['password'])) {


    $userQuery = $db->prepare('SELECT * FROM login WHERE idlogin = ?');
    $userQuery->execute([$_POST['email']]);
    $user = $userQuery->fetchAll();


    if (sizeof($user) !== 0) {

        if (password_verify($_POST['password'], $user[0]['passwordHash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_authenticated'] = true;

            header('Location: ./index.php');
            exit();
        } else {
            $errors['authentication'] = 'Invalid email or password';
        }
    } else {
        $errors['authentication'] = 'Invalid email or password';
    }
}
		
?>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php require("./masterpage.php"); ?>
<table bgcolor="#f2f2f2" style="padding:50px" align="center" width="550px">
<form action="" method="post">
<tr><td align="center" colspan="2"> <h1>Login Page</h1> </td></tr>
<tr>
<td> Email : </td><td><input type="email" name="email"></td>
</tr>
<tr>
<td> Password : </td><td><input type="password" name="password"></td>
</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="submit"></td></tr>
<td align="center" colspan="2"><a href="signup.php"><button type="button">Click Here To SignUp</button></a></td></tr>

</form>
<?php if (isset($errors['authentication'])) {
        print "<p>{$errors['authentication']}</p>";
    }
    ?>
</table>


</body>
</html>