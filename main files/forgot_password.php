<!DOCTYPE html>
<html>
    <head>
                    <title>Forgot Password</title>
                
                    <style>
                        body {
                            font-family: 'Times New Roman', Times, serif;
                            background-color: #f4f4f4;
                            background-image: url("https://img.freepik.com/free-photo/front-view-finance-business-elements-assortment_23-2148793759.jpg?w=740&t=st=1677137459~exp=1677138059~hmac=0c6d504cc187f06318d5550821ae9266055868b9daa261de99edb655156aaf46");
                            background-size: 100%;
                        
                        }
                        form {
                            max-width: 400px;
                            margin: 50px auto;
                            padding: 20px;
                            background-color: #f0f5f5;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                            border-radius: 5px;
                        }
                        h2 {
                            text-align: center;
                            margin-bottom: 20px;
                            color: #fff;
                            font-size:50px;
                        
                        }
                        label {
                            
                            margin-bottom: 10px;
                            color: #666;
                            font-size: 16px;
                            font-weight: bold;
                        }
                        input[type="text"],
                        input[type="password"] {
                            width: 90%;
                            padding: 10px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            font-size: 16px;
                            margin-bottom: 20px;
                        }
                        input[type="submit"] {
                            background-color: #007bff;
                            color: #fff;
                            border: none;
                            border-radius: 5px;
                            padding: 10px 20px;
                            font-size: 19px;
                            font-family: Times New Roman;
                            cursor: pointer;
                        }
                        input[type="submit"]:hover {
                            background-color: #0069d9;
                        }
                    </style>
    </head>

    <body>
                    <h2>Forgot Password</h2>
                    
                    
                    
                    <form method="POST">
                        <label>Username : <span style="color: red;">*</span> </label>
                        <input type="text" name="username" required><br><br>
                        <label>New Password : <span style="color: red;">*</span> </label>
                        <input type="password" name="password" required><br><br>
                        <label>Confirm Password : <span style="color: red;">*</span> </label>
                        <input type="password" name="confirm_password" required><br><br>
                        <input type="submit" name="submit" value="Reset Password">
						<br>
                         <a href="user_login.php" for="log-in"> Login </a>
            
                    </form>

    </body>
</html>

<?php

                        if(isset($_POST['submit'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $confirm_password = $_POST['confirm_password'];

                            // check if password and confirm password match
                            if($password != $confirm_password){
                                echo "<center><span style='color: red;'> Passwords do not match.</span></center>";
                                exit();
                            }

                            // connect to database
                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "loan_db";
                            $conn =  mysqli_connect($host, $dbusername, $dbpassword, $dbname);
                        
                            // check connection
                            if(!$conn){
                                die("Connection failed: ".mysqli_connect_error());
                            }

                            // update password in database
                            $sql = "UPDATE user SET password='$password' WHERE username='$username'";
                            
                            if(mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0){
                                echo "<center><span style='color:green; margin-top:15%;' >Password updated successfully.</span></center>";
                            } else {
                                echo "<center><span style='color:red;'>Error! User does not exist or failed to reset password: </span></center>" . mysqli_error($conn);
                            }
                        

                            // close connection
                            mysqli_close($conn);
                        }
?>