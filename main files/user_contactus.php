<?php include 'user_header.html'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us Form</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        h1 {
            text-align: center;
        }
        .card {
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
          /* Footer styles */
.footer {
  background-color: #333;
  color: #fff;
  padding: 0.005px 0;
}

.footer-col {
  width: 100%;
  padding: 0 15px;
  text-align: left;
}

.footer-col h4 {
  font-size: 18px;
  margin-bottom: 30px;
}

.footer-col ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.footer-col ul li {
  margin-bottom: 10px;
}

.footer-col ul li a {
  color: #fff;
  text-decoration: none;
}

.footer-col ul li a:hover {
  color: #aaa;
}




.social-links i {
  font-size: 20px;
  vertical-align: middle;

}
.social-links a {
 
 color: #fff;
}
.social-links a:hover {
 
  color: blue;
}

.container {
  display: flex;
  flex-wrap: wrap;
}

.row {
  display: flex;
  flex: 1;
}

.footer-col {
  flex: 1;
}
  
    </style>
    <script>
        function validateForm() {
            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let phone = document.getElementById("phone").value.trim();
            let message = document.getElementById("message").value.trim();
            let error = false;

            // Name validation
            if (name === "") {
                document.getElementById("nameError").innerHTML = "Name is required!";
                error = true;
            } else {
                document.getElementById("nameError").innerHTML = "";
            }

            // Email validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById("emailError").innerHTML = "Invalid email format!";
                error = true;
            } else {
                document.getElementById("emailError").innerHTML = "";
            }

            // Phone number validation
            let phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById("phoneError").innerHTML = "Enter a valid 10-digit phone number!";
                error = true;
            } else {
                document.getElementById("phoneError").innerHTML = "";
            }

            // Message validation
            if (message === "") {
                document.getElementById("messageError").innerHTML = "Message cannot be empty!";
                error = true;
            } else {
                document.getElementById("messageError").innerHTML = "";
            }

            return !error;
        }
    </script>
</head>
<body>

<h1>Contact Us</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);
    $errors = [];

    // Server-side validation
    if (empty($name)) {
        $errors[] = "Name is required!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Enter a valid 10-digit phone number!";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty!";
    }

    if (empty($errors)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "loan_db";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO contactus (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='color: green; text-align: center;'>Record added successfully!</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Error adding record: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "<ul style='color: red; text-align: center;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>

<div class="card">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
        <label for="name">Name : <span style="color: red;">*</span></label>
        <input type="text" id="name" name="name">
        <span class="error" id="nameError"></span>

        <label for="email">Email : <span style="color: red;">*</span></label>
        <input type="email" id="email" name="email">
        <span class="error" id="emailError"></span>

        <label for="phone">Phone Number : <span style="color: red;">*</span></label>
        <input type="tel" id="phone" name="phone">
        <span class="error" id="phoneError"></span>

        <label for="message">Message : </label>
        <textarea id="message" name="message" rows="5"></textarea>
        <span class="error" id="messageError"></span>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<footer class="footer">
        <div class="container">
            <div class="row">
            <div class="footer-col">
               <p>Contact No: <a href="https://api.whatsapp.com/send?phone=9662044760" style="color: white;"><i class="fab fa-whatsapp"></i>9662044760</a></p>
               <p>&copy; 2025 Loan Management System</p>  
            </div>
            </div>
                <div class="footer-col">
                    <h4>Loan Type</h4>
                    <ul>
                        <li><a href="#">Home Loans</a></li>
                        <li><a href="#">Gold Loans</a></li>
                        <li><a href="#">Students Loans</a></li>
                        <li><a href="#">Business Loans</a></li>
                        <li><a href="#">vehical Loans</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/login/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/login?"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/login"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
   </footer>

</body>
</html>
