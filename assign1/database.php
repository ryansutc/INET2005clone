<?php
/**
 * Make a Connection to  employee mySQL Database
 * Created by RSutcliffe
 * Created: 9/27/16
 *
 * PHP Support file for Lab 3
 */


    function getEmployeeDbConn()
    {
        $conn = @mysqli_connect("localhost", "root", "inet2005", "employees");
        if (!$conn){
            die("Could not connect to DB: " . mysqli_connect_error($conn));
        }
        return $conn;

        /*
         * Alternate Syntax for connection string
         * (From Sams Teach Yourself MySQL, Apache and PHP, p358)

        $mysqli = new mysqli("localhost", "root", "inet2005", "sakila");

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        else {
            printf("Host information: %s\n", mysqli_get_host_info($mysqli));
        }
        */
    }

    //OTHER FUNCTIONS
    function clean($data) {
        /* Try to prevent any SQL Injections */
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function orderColumnLink($page, $titleQuery, $startRow, $totalRecords, $sortField, $sortType){
        /* Takes query and sort parameters and returns a page link
         based on these
        http://localhost:8000/employees.php?titlequery=t&startRow=0&lastRecord=300024&sortField=emp_no&sortType=ASC&filter=Filter
        */

        $sortType = ($sortType == 'ASC' ? 'DESC' : 'ASC');
        $pageLink = $page . '?titlequery=' .
            $titleQuery . '&startRow=' .
            $startRow . '&lastRecord=' .
            $totalRecords . '&sortField=' .
            $sortField . '&sortType=' .
            $sortType . '&filter=Filter';

        echo $pageLink;
        return $pageLink;
    }

    function orderSymbol($field,$sortField, $sortType) {
        /* Provides the Appropriate symbol based on whether field is sorted
        on or not
        */

        if ($field == $sortField){
            $symbol = ($sortType == 'ASC' ? '&#x25B2' : '&#x25BC');
        }
        else {
            $symbol = '-';
        }
        return $symbol;
    }

    function editRecordLink($emp_no){
        //return link to correct record to update and pass to form
        //[todo: update table]
        return "editemployee.php?emp_no=" . $emp_no;
    }

    function deleteRecordLink($emp_id){
        //return link to correct record to delete
        //[todo: create delete page]
        return "deleteemployee.php";
    }

    function setGender($gender, $genderVal){
        if ($gender == $genderVal) {
            return "Selected";
        }
        else {
            return "";
        }
    }

    function checkIfLoggedIn() {
        /*Validation to Check if the user is logged in
           - based on website here: http://www.phpeasystep.com/phptu/6.html
         */
        session_start();
        if(IS_EMPTY($_SESSION['login'])) {
            header("location:login.php");
        }
    }