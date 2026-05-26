
<!DOCTYPE html>
<html>

<head>
    <title>user Login</title>

    <title>user LogIn</title>
    <link rel="stylesheet" type="text/css" href="D:\Xampp\htdocs\final-project\2_house_rental\house_rental\login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
            <style>
 body {
    margin-bottom: 10px;
    padding-bottom: 3%;
	font-family: Arial, sans-serif;
	background-color: #f4f4f4;
     background-image: url("https://img.freepik.com/free-photo/front-view-finance-business-elements-assortment_23-2148793759.jpg?w=740&t=st=1677137459~exp=1677138059~hmac=0c6d504cc187f06318d5550821ae9266055868b9daa261de99edb655156aaf46"); */
    background-size: 100%;
        
		
}
h1{
    color: #fff;
}

form {
    background-color: #f0f5f5;
    border-radius: 20px;
    padding: 10px;
    width: 400px;
    margin: auto;
    margin-top: 20px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.3);
    align-items: center;
    flex-direction: column;
}

label {
    
    margin-bottom: 10px;
    font-size: 16px;
}

input[type="text"],
input[type="password"] {
    width: 60%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 10px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0069d9;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

            </style>
</head>
<body>
    

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from login form
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Connect to the database
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "loan_db";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if username and password match a record in the users table
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION["username"] = $username;
        header("location: user_home.php");
    } else {
        // Login failed
        echo "<h3><center><span style='color: red;'>Error! invalid username or password</style></center></h3>";
    }
    
    $conn->close();
}
?>
<center>
        <br><br><br><br>
        <h1>User Log In</h1>

 <form action="user_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <input type="submit" value="Login" class="col-md-4 btn btn-success">
            <br>
            <br>
            <a href="usersignup.html" class="col-md-4 btn btn-primary">Sign Up </a>
            <br>
            <a href="forgot_password.php">Forgot Password?</a>
            <br>
            <a href="login.php">admin</a>
        </form>
    </center>
</body>

</html>