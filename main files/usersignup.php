<?php
include("connection.php");

$fname    = $_GET['fname'];
$lname    = $_GET['lname'];
$address  = $_GET['address'];
$dob      = $_GET['dob'];
$gender   = $_GET['gender'];
$age      = $_GET['age'];
$contact  = $_GET['contact'];
$email    = $_GET['email'];
$username = $_GET['username'];
$password = $_GET['password'];

if (isset($_GET['submit'])) {

    if ($fname != "" && $lname != "" && $address != "" && $dob != "" && $gender != "" && $age != "" && $contact != "" && $email != "" && $username != "" && $password != "") {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/', $password)) {

                $query = "INSERT INTO user (fname, lname, address, dob, gender, age, contact, email, username, password) 
                          VALUES ('$fname', '$lname', '$address', '$dob', '$gender', '$age', '$contact', '$email', '$username', '$password')";
                $data = mysqli_query($conn, $query);

                if ($data) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header('location: user_login.php');
                } else {
                    echo "<script type='text/javascript'>alert('Error! Sign up unsuccessful.');
                          window.location.href='usersignup.html';
                          </script>";
                }

            } else {
                echo "<script type='text/javascript'>alert('Error! Password must be at least 5 characters long and contain at least one letter and one number.');
                      window.location.href='usersignup.html';
                      </script>";
            }

        } else {
            echo "<script type='text/javascript'>alert('Error! Please enter a valid email address.');
                  window.location.href='usersignup.html';
                  </script>";
        }

    } else {
        echo "<script type='text/javascript'>alert('Error! Please fill in all the fields.');
              window.location.href='usersignup.html';
              </script>";
    }
}
?>
