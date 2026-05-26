<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            padding: 30px;
            width: 50%;
            margin-bottom: 20px;
            align-items: center;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"], input[type="button"] {
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 40%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="button"] {
            background-color: blue;
        }

        input[type="button"]:hover {
            background-color: #1E90FF;
        }
    </style>

    <script>
        function validateForm() {
            let lastname = document.forms["borrower"]["lastname"].value.trim();
            let firstname = document.forms["borrower"]["firstname"].value.trim();
            let address = document.forms["borrower"]["address"].value.trim();
            let contact_no = document.forms["borrower"]["contact_no"].value.trim();
            let email = document.forms["borrower"]["email"].value.trim();

            if (lastname === "" || firstname === "" || address === "") {
                document.getElementById("message").innerHTML = '<div class="alert alert-danger">Please fill in all required fields.</div>';
                return false;
            }

            if (!/^\d{10}$/.test(contact_no)) {
                document.getElementById("message").innerHTML = '<div class="alert alert-danger">Enter a valid 10-digit contact number.</div>';
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById("message").innerHTML = '<div class="alert alert-danger">Invalid email format.</div>';
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <?php
    include ('connection.php');
    $message = "";

    if (isset($_POST['submit'])) {
        $lastname = trim($_POST['lastname']);
        $firstname = trim($_POST['firstname']);
        $middlename = trim($_POST['middlename']);
        $address = trim($_POST['address']);
        $contact_no = trim($_POST['contact_no']);
        $email = trim($_POST['email']);
        $tax_id = trim($_POST['tax_id']);
        $errors = [];

        if (empty($lastname) || empty($firstname) || empty($address)) {
            $errors[] = "All required fields must be filled.";
        }
        if (!preg_match("/^\d{10}$/", $contact_no)) {
            $errors[] = "Enter a valid 10-digit contact number.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (empty($errors)) {
            $sql = "INSERT INTO borrowers (lastname, firstname, middlename, address, contact_no, email, tax_id)
                    VALUES ('$lastname', '$firstname', '$middlename', '$address', '$contact_no', '$email', '$tax_id')";

            if ($conn->query($sql) === TRUE) {
                $message = '<div class="alert alert-success">User details submitted successfully!</div>';
                header("refresh:2;url=User_loan.php"); // Redirect after 2 seconds
            } else {
                $message = '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
            }
            $conn->close();
        } else {
            $message = '<div class="alert alert-danger">' . implode("<br>", $errors) . '</div>';
        }
    }
    ?>

    <div class="container-fluid">
        <div class="col-lg-12">
            <center>
                <form id="borrower" class="card" name="borrower" action="user_details.php" method="post" onsubmit="return validateForm();">
                    <h2>User Details</h2>
                    
                    <div id="message"><?php echo $message; ?></div> <!-- Display messages here -->
                    
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Last Name <span style="color: red;">*</span></label>
                                <input name="lastname" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">First Name <span style="color: red;">*</span></label>
                                <input name="firstname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middle Name <span style="color: red;">*</span></label>
                                <input name="middlename" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Address <span style="color: red;">*</span></label>
                            <textarea name="address" cols="30" rows="2" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-5">
                            <div class="">
                                <label for="">Contact <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="contact_no">
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-5">
                            <div class="">
                                <label for="">Tax ID <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="tax_id">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col-md-5">
                        <div class="">
                            <input type="submit" name="submit" value="Next">
                            <input type="button" value="Cancel" onclick="window.location.href='loan_details.php'">
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>
