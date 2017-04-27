<?php
/**
 * Edit existing employee record in employees mySQL Database
 * Created by RSutcliffe
 * Created: 10/06/16
 * Assign 1
 */
require 'database.php';
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="css/default_styles.css" />
    <script src="js/formvalidation.js" type="text/javascript"></script>
    <head>
        <title>Edit Employees Record</title>
    </head>
    <?php
    $resultNote = "";
    $conn = getEmployeeDbConn();
    $formStatus = '';
    //first check if form was submitted
    if (isset($_GET['Save'])) {
        //form was submitted

        $formStatus = "disabled";

        $emp_no = clean($_GET['emp_no']);
        $birth_date = clean($_GET['birth_date']);
        $first_name = clean($_GET['first_name']);
        $last_name = clean($_GET['last_name']);
        $gender = clean($_GET['gender']);
        $hire_date = clean($_GET['hire_date']);

        $sql = "UPDATE employees SET ";
        $sql .= "birth_date = STR_TO_DATE('$birth_date','%Y-%m-%d'),";
        $sql .= "first_name = '$first_name',";
        $sql .= "last_name = '$last_name',";
        $sql .= "gender = '$gender',";
        $sql .= "hire_date = STR_TO_DATE('$hire_date','%Y-%m-%d')";
        $sql .= " WHERE emp_no = $emp_no;";

        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            die("Unable to update database : " . mysqli_error($conn));
        }
        else {
            $resultNote = "<p>Record was successfully updated </p>";
        }
    }

    else if (isset($_GET['emp_no'])) {

        $emp_no = clean($_GET['emp_no']);

        $sql = "SELECT * FROM employees WHERE emp_no = $emp_no;";

        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            die("Unable to query database : " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        $birth_date = $row['birth_date'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $gender = $row['gender'];
        $hire_date = $row['hire_date'];
    }
    ?>

    <body>
    <div id="mainwrapper">
        <h1>Update Employee Record</h1>
        <div id="mainframe">

            <p>Update Employee (<?php echo $emp_no; ?>):
            <form action="<?php $_SERVER['PHP_SELF']?>" method="get" name="updateEmployeeForm"  onsubmit="return saveEditRecords()">
                <input name="emp_no"
                       value="<?php echo $emp_no;?>"
                       type="hidden"
                />
                <label for="birth_date">Birthdate:</label>
                <input class="update"
                       id="birth_date"
                       name="birth_date"
                       type="date"
                       value="<?php echo $birth_date; ?>"
                       onblur="warningText(this,'Error: Please Enter a valid birthdate','birth_date_err')"
                       <?php echo $formStatus; ?>
                />
                <span class="error"
                      id="first_name_err"></span>
                <br/>

                <label for="first_name">First Name:</label>
                <input class="update"
                       id="first_name"
                       name="first_name"
                       type="text"
                       value="<?php echo $first_name; ?>"
                       onblur="warningText(this,'Error: Please Enter a valid first name','first_name_err')"
                        <?php echo $formStatus; ?>

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
                       onblur="warningText(this,'Error: Please Enter a valid last name','last_name_err')"
                       <?php echo $formStatus; ?>

                />
                <span class="error"
                      id="last_name_err"></span>
                <br/>

                <label for="gender">Gender:</label>
                <select class="update" name="gender" id="gender" <?php echo $formStatus; ?> >
                    <option value="M" <?php echo setGender($gender, 'M');?> >Male</option>
                    <option value="F" <?php echo setGender($gender, 'F');?> >Female</option>
                </select>
                <br/>
                <label for="hire_date">Hire Date:</label>
                <input class="update"
                       id="hire_date"
                       name="hire_date"
                       type="date"
                       value="<?php echo $hire_date; ?>"
                       onblur="warningText(this,'Error: Please Enter a valid hire date','hire_date_err')"
                       <?php echo $formStatus; ?>
                />
                <span class="error"
                      id="hire_date_err"></span>
                <br/>
                <input class="update"
                       id="Save"
                       name="Save"
                       type="submit"
                       value="Save"
                        <?php echo $formStatus; ?>

                />

                <input class="update"
                       id="cancelEdit"
                       name="cancel"
                       onClick="cancelEditRecords('<?php echo $first_name; ?>', '<?php echo $last_name; ?>')"
                       type="button"
                       value="Cancel"
                    <?php echo $formStatus; ?>
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