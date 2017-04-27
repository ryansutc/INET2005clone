<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/10/16
 * Time: 9:58 AM
 */
session_start();
if(empty($_SESSION['login'])) {
    header("location:login.php");
}
?>

<html>
<body>
<p>Login Successful</p>
</body>
</html>