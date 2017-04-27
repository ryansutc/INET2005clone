<?php
/**
 * Handle logging in to access employees in mySQL Database
 * Created by RSutcliffe
 * Created: 10/06/16
 * Assign 1
 */
require 'database.php';
session_start();
session_destroy();
ob_start(); //buffering on?
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="css/default_styles.css" />
    <script src="js/formvalidation.js" type="text/javascript"></script>
    <head>
        <title>Login to Access Employees Tables</title>
    </head>
    <?php
    $conn = getEmployeeDbConn();

    //first check if form was submitted
    if (isset($_POST['login'])) {
        //form was submitted
        $username = clean($_POST['username']);
        $password = clean($_POST['password']);

        echo password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT user_name, user_pwd FROM webusers WHERE ";
        $sql .= "user_name = '$username';";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Unable to connect to database : " . mysqli_error($conn));
        }
        else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_array()) {
                    if (password_verify($password, $row['user_pwd'])) {
                        //successfully logged in
                        // Register $myusername, $mypassword and redirect to file "login_success.php"
                        session_start();
                        $_SESSION['login'] = $username;
                        $_SESSION['password'] = $password; //do I really want to store the password?
                        header("location:employees.php");
                        break;
                    }
                    else {
                        echo "Wrong Username or Password";
                    }
                }
            }
            else {
                echo "That username does not exist";
                //echo password_hash($password. PASSWORD_DEFAULT);
            }
        }
    }
    ?>
    <body>
        <div id="mainwrapper">
            <h1>Please Sign in</h1>
            <div id="mainframe">

                <form action="<?php $_PHP_SELF ?>" method="post" name="login">
                    <label for="username">User Name:</label>
                    <input class="update"
                           id="username"
                           name="username"
                           type="text"
                           value=""
                           //onblur="warningText(this,'Error: Please Enter a valid birthdate','birth_date_err')"
                    />
                    <span class="error"
                          id="username_err"></span>
                    <br/>

                    <label for="password">Password:</label>
                    <input class="update"
                           id="password"
                           name="password"
                           type="password"
                           value=""
                           //onblur="warningText(this,'Error: Please Enter a valid first name','first_name_err'); unfocusItem('first_name')"
                    />
                    <span class="error"
                          id="password_err"></span>
                    <br/>
                    <input class="update" name="login" type="submit" value="log in" />
                </form>
            </div>
        </div>
    </body>
<?php ob_end_flush(); ?>
</html>
