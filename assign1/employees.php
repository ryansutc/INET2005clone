<?php
/**
 * Connect to employees mySQL Database and
 * show employees records in html table
 * Created by RSutcliffe
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
    <script src="js/formvalidation.js" type="text/javascript"></script>
    <head>
        <title>Employees Table</title>
    </head>
    <body>
    <div id="mainwrapper">
        <h1>View and Modify Employee Table Records</h1>

        <?php
            $conn = getEmployeeDbConn();
            $self = $_SERVER['PHP_SELF'];
            $recordCount = 20;

            //Check, populate the search filter
            $titleQuery = "";
            if (isset($_GET['filter'])) {
                $titleQuery = clean($_GET['titlequery']);
            }
            //Check , populate the start row
            $startRow = 0;
            if (!empty($_GET['startRow'])){
                $startRow = clean($_GET['startRow']);
            }
            //Check, populate the order by field
            $sortField = 'emp_no';
            if (isset($_GET['sortField'])){
                $sortField = clean($_GET['sortField']);
            }
            //Check, populate the order by type
            $sortType = 'ASC';
            if (isset($_GET['sortType'])){
                $sortType = clean($_GET['sortType']);
            }
            //if delete button triggered
            if (isset($_GET['deleteRow'])){
                $deleteRow = clean($_GET['emp_no']);
                $deleteSQL = "DELETE FROM employees WHERE emp_no = ";
                $deleteSQL .= $deleteRow . ";";

                $result = mysqli_query($conn, $deleteSQL);
                if(!$result) {
                    echo "Error"; //trap error info here somehow
                    die("Could not delete record with actor_id = " . $deleteRow);
                }
                else {
                    echo "Successfully deleted " . mysqli_affected_rows($conn) . " record(s)";
                }
            }

            $sql = "SELECT * FROM employees WHERE LOWER(last_name) LIKE LOWER('%" . $titleQuery . "%')";
            $sql .= " OR LOWER(first_name) LIKE LOWER('%" . $titleQuery . "%')";
            $sql .= " ORDER BY " . $sortField . " " . $sortType;
            $sql .= " LIMIT " . $startRow. "," . $recordCount . ";";

            $sqlCount = "SELECT COUNT(*) AS total FROM employees WHERE LOWER(last_name) LIKE LOWER('%" . $titleQuery . "%')";
            $sqlCount .= " OR LOWER(first_name) LIKE LOWER('%" . $titleQuery . "%');";
            $result = mysqli_query($conn, $sql);

            $recordCount = mysqli_query($conn, $sqlCount);
            $totalRecords = mysqli_fetch_assoc($recordCount)['total'];

            if(!$result)
            {
                die("Could not retrieve records from db: " . mysqli_error($conn));
            }
            ?>
            <div id="mainframe">
                <div id="login">
                    <p style='text-align:right'> You're Logged in as: <b> <?php echo $_SESSION['login']; ?></b> <br/>
                        <a href="login.php">logout</a></p>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td><b>Emp No</b>
                                <span><a class="order" style="color:white" href="
                                    <?php
                                        $field = 'emp_no';
                                        echo orderColumnLink($_SERVER['PHP_SELF'],
                                                            $titleQuery,
                                                            $startRow,
                                                            $totalRecords,
                                                            $field,
                                                            $sortType);
                                    ?>"
                                >
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a></span>
                            </td>
                            <td><b>Birthdate</b>
                                <a href="
                                    <?php
                                        $field = 'birth_date';
                                        echo orderColumnLink($_SERVER['PHP_SELF'],
                                            $titleQuery,
                                            $startRow,
                                            $totalRecords,
                                            $field,
                                            $sortType);
                                    ?>"
                               class='order'>
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a>
                            </td>
                            <td><b>First Name</b>
                                <a href="
                                    <?php
                                $field = 'first_name';
                                echo orderColumnLink($_SERVER['PHP_SELF'],
                                    $titleQuery,
                                    $startRow,
                                    $totalRecords,
                                    $field,
                                    $sortType);
                                ?>"
                               class='order'>
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a>
                            </td>
                            <td><b>Last Name</b>
                                <a href="
                                    <?php
                                $field = 'last_name';
                                echo orderColumnLink($_SERVER['PHP_SELF'],
                                    $titleQuery,
                                    $startRow,
                                    $totalRecords,
                                    $field,
                                    $sortType);
                                ?>"
                               class='order'>
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a>
                            </td>
                            <td><b>Gender</b>
                                <a href="
                                    <?php
                                $field = 'gender';
                                echo orderColumnLink($_SERVER['PHP_SELF'],
                                    $titleQuery,
                                    $startRow,
                                    $totalRecords,
                                    $field,
                                    $sortType);
                                ?>"
                               class='order'>
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a>
                            </td>
                            <td><b>Hire Date</b>
                                <a href="
                                    <?php
                                $field = 'hire_date';
                                echo orderColumnLink($_SERVER['PHP_SELF'],
                                    $titleQuery,
                                    $startRow,
                                    $totalRecords,
                                    $field,
                                    $sortType);
                                ?>"
                               class='order'>
                                    <?php echo orderSymbol($field,$sortField, $sortType); ?>
                                </a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        while($row = mysqli_fetch_assoc($result)){
                            $row_emp_no = $row['emp_no'];
                            echo "<tr><td>" . $row_emp_no. "</td>" .
                                "<td>" . $row['birth_date'] . "</td>" .
                                "<td>" . $row['first_name'] . "</td>" .
                                "<td>" . $row['last_name'] . "</td>" .
                                "<td>" . $row['gender'] . "</td>" .
                                "<td>" . $row['hire_date'] . "</td>" .
                                "<td>" . "<a href='" . editRecordLink($row_emp_no) . "'" .
                                " > <img src=\"img/edit.png\" alt=\"Edit\" style=\"width:15px;\"></a></td>";
                    ?>
                        <td><form action="<?php $self ?>" method='get' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                <input name="emp_no" type='hidden' name="emp_no" value="<?php echo $row_emp_no;?>"/>
                                <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                            </form>
                        </td>
                    <?php } ?>

                    </tbody>
                </table>
                <span>
                    <?php
                        if ($startRow >= 20){
                            $prevRec = $startRow - 20;
                            echo "<a href='$self?titlequery=$titleQuery&startRow=$prevRec&lastRecord=1000&filter=Filter'>Prev</a>";
                        }
                        else {
                            $prevRec = 0;
                            echo "Prev";
                        }
                        echo " | ";
                        if ($startRow <= $totalRecords - 40){
                            $nextRec = $startRow + 20;

                            echo "<a href='$self?titlequery=$titleQuery&startRow=$nextRec&lastRecord=1000&filter=Filter'>Next</a>";
                        }
                        else {
                            $nextRec = $startRow;
                            echo "Next";
                        }
                    ?>
                </span>
                <p>Filter Title:
                    <form action="<?php $self ?>" method="get" name="filterTitle" >
                        <input name="titlequery" type="text" value="<?php echo $titleQuery ?>"/>
                        <input name="startRow" type="hidden" id="startRow" value="0"/>
                        <input name="lastRecord" type="hidden" id="lastRow" value="<?php echo $totalRecords ?>"/>
                        <input name="sortField" type="hidden" id="sortField" value="<?php echo $sortField; ?>" />
                        <input name="sortType" type="hidden" id="sortType" value="<?php echo $sortType; ?>" />
                        <input name="filter" type="submit" value="Filter">
                    </form>
                </p>
                <p><a href="addemployee.php" class="links">Add a New Employee</a></p>

            </div>
        </div>
    </body>
</html>

<?php mysqli_close($conn); ?>