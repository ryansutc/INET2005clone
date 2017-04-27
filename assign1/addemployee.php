<?php
/**
 * Add new employee record into employees mySQL Database
 * Created by RSutcliffe
 * Created: 10/08/16
 * Assign 1
 */
require 'database.php';
session_start();
if(empty($_SESSION['login'])) {
    header("location:login.php");
}
?>
    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" type="text/css" href="css/default_styles.css" />
    <link rel="stylesheet" type="text/css" href="css/calendar.css" />
    <script src="js/formvalidation.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
    <head>
        <title>Add a New Employees Record</title>
    </head>
    <?php
    $conn = getEmployeeDbConn();

    $birth_date = '';
    $first_name = '';
    $last_name = '';
    $gender = '';
    $hire_date = '';
    $resultNote = '';

    //first check if form was submitted
    if (isset($_GET['Add'])) {
        //form was submitted

        $birth_date = clean($_GET['birth_date']);
        $first_name = clean($_GET['first_name']);
        $last_name = clean($_GET['last_name']);
        $gender = clean($_GET['gender']);
        $hire_date = clean($_GET['hire_date']);

        $sql = "INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date) ";
        $sql .= "VALUES (STR_TO_DATE('$birth_date','%Y-%m-%d'),";
        $sql .= "'$first_name',";
        $sql .= "'$last_name',";
        $sql .= "'$gender',";
        $sql .= "STR_TO_DATE('$hire_date','%Y-%m-%d'));";

        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo("Unable to add to database : " . mysqli_error($conn));
        }
        else {
            $resultNote = "<p>Record was successfully added <img src='img/check.png' width='10px'> </p>";
        }
    }

    else {
        $resultNote =  "<p>Please add a record</p>";
    }
    ?>

    <body>
    <div id="mainwrapper">
        <h1>Add a New Employee Record</h1>
        <div id="mainframe">
            <div id="login">
                <p style='text-align:right'> You're Logged in as: <b> <?php echo $_SESSION['login']; ?></b> <br/>
                    <a href="login.php">logout</a></p>
            </div>
            <p>Add a New Employee:
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get" name="addEmployeeForm"  onsubmit="return saveEditRecords()">

                <label for="birth_date">Birthdate:</label>
                <input class="update"
                       id="birth_date"
                       name="birth_date"
                       type="text"
                       value="YYYY-MM-DD"
                       onblur="warningDate(this,'Error: Please Enter a valid birthdate (yyyy-mm-dd)','birth_date_err')"
                />
                <span id="calendar">
						<img id="cal_img" class="datepicker" src="img/calendar.gif" alt="Pick a date.">
					</span>

                <script type="text/javascript">
                    Calendar.setup({
                        inputField	 : "birth_date",
                        baseField    : "birth_date",
                        displayArea  : "calendar",
                        button		 : "cal_img",
                        onSelect	 : selectDate
                    });
                </script>
                <span class="error" id="birth_date_err"></span>
                <br/>

                <label for="first_name">First Name:</label>
                <input class="update"
                       id="first_name"
                       name="first_name"
                       type="text"
                       value="<?php echo $first_name; ?>"
                       onblur="warningText(this,'Error: Please Enter a valid first name','first_name_err'); unfocusItem('first_name')"
                />
                <span class="error"
                      id="first_name_err"></span>
                <br/>

                <label for="last_name">Last Name:</label>
                <input class="update"
                       id="last_name"
                       name="last_name"
                       type="text"
                       value="<?php echo $last_name; ?>"
                       onblur="warningText(this,'Error: Please Enter a valid last name','last_name_err'); unfocusItem('last_name')"

                />
                <span class="error"
                      id="last_name_err"></span>
                <br/>

                <label for="gender">Gender:</label>
                <select class="update" name="gender" id="gender" >
                    <option value="M" <?php echo setGender($gender, 'M');?> >Male</option>
                    <option value="F" <?php echo setGender($gender, 'F');?> >Female</option>
                </select>
                <br/>
                <label for="hire_date">Hire Date:</label>
                <input class="update"
                       id="hire_date"
                       name="hire_date"
                       type="text"
                       value="YYYY-MM-DD"
                       onblur="warningDate(this,'Error: Please Enter a valid hire date (YYYY-MM-DD)','hire_date_err')"
                />
                <span id="calendar2">
						<img id="cal_img2" class="datepicker" src="img/calendar.gif" alt="Pick a date.">
					</span>

                <script type="text/javascript">
                    Calendar.setup({
                        inputField	 : "hire_date",
                        baseField    : "hire_date",
                        displayArea  : "calendar2",
                        button		 : "cal_img2",
                        onSelect	 : selectDate
                    });
                </script>
                <span class="error"
                      id="hire_date_err"></span>
                <br/>
                <input class="update"
                       id="Add"
                       name="Add"
                       type="submit"
                       value="Add"
                />

            </form>
            <?php echo $resultNote; ?>
            </p>
            <p><a href="employees.php">Go back to Employees Table</a></p>
        </div>
    </div>
    </body>
    </html>
<?php mysqli_close($conn); ?>