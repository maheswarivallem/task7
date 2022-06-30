<?php
session_start();
require 'config.php';

if(isset($_POST['delete_college']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_college']);

    $query = "DELETE FROM college WHERE id='$college_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "college Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "College Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_college']))
{
    $college_id = mysqli_real_escape_string($con, $_POST['college_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $branches = mysqli_real_escape_string($con, $_POST['branches']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $fees = mysqli_real_escape_string($con, $_POST['fees']);

    $query = "UPDATE college SET name='$name', branches='$branches', year='$year', fees='$fees' WHERE id='$college_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "College Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "college Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_college']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $branches = mysqli_real_escape_string($con, $_POST['branches']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $fees = mysqli_real_escape_string($con, $_POST['fees']);

    $query = "INSERT INTO college (name,branches,year,fees) VALUES ('$name','$branches','$year','$fees')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "college Created Successfully";
        header("Location: college-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "college Not Created";
        header("Location: college-create.php");
        exit(0);
    }
}


?>
