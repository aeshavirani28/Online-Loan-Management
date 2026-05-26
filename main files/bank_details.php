<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <style>
        body {
            background-color: #f4f4f4;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            text-align: left;
            margin: 10px 0 5px;
        }
        input, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .error {
            color: red;
            font-size: 14px;
            text-align: left;
            margin-bottom: 10px;
        }
        .button-container {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn {
            background-color: #28a745;
            color: white;
        }
        .submit-btn:hover {
            background-color: rgb(29, 130, 51);
        }
        .cancel-btn {
            background-color: #dc3545;
            color: white;
        }
        .cancel-btn:hover {
            background-color: rgb(174, 35, 49);
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";  // Change if using a different DB user
$password = "";  // Set password if applicable
$dbname = "loan_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bank_name = trim(htmlspecialchars($_POST['bank_name']));
    $branch_name = trim(htmlspecialchars($_POST['branch_name']));
    $account_holder = trim(htmlspecialchars($_POST['account_holder']));
    $account_number = trim($_POST['account_number']);
    $ifsc_code = trim(htmlspecialchars($_POST['ifsc_code']));

    // Validate IFSC Code
    if (!preg_match("/^[A-Z]{4}0[A-Z0-9]{6}$/", $ifsc_code)) {
        echo "<p style='color:red;'>Invalid IFSC Code format.</p>";
    } elseif (!ctype_digit($account_number)) {
        echo "<p style='color:red;'>Account number must contain only numbers.</p>";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO bank_details (bank_name, branch_name, account_holder, account_number, ifsc_code) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("SQL Prepare Failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssis", $bank_name, $branch_name, $account_holder, $account_number, $ifsc_code);

        // Execute statement
        if ($stmt->execute()) {
            echo "<p style='color:green;'>Bank details added successfully.</p>";
            header("Location: user_document.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>

<div class="container">
    <h2>Enter Bank Details</h2>
    <form id="bankForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Bank Name: <span style="color: red;">*</span></label>
        <select name="bank_name" id="bank_name" required>
            <option value="">-- Select Bank --</option>
            <option value="State Bank of India">State Bank of India</option>
            <option value="HDFC Bank">HDFC Bank</option>
            <option value="ICICI Bank">ICICI Bank</option>
            <option value="Axis Bank">Axis Bank</option>
            <option value="Punjab National Bank">Punjab National Bank</option>
            <option value="Bank of Baroda">Bank of Baroda</option>
            <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
            <option value="Canara Bank">Canara Bank</option>
        </select>
        <span class="error" id="bankError"></span>

        <label>Branch Name: <span style="color: red;">*</span></label>
        <input type="text" id="branch_name" name="branch_name" required>
        <span class="error" id="branchError"></span>

        <label>Account Holder Name: <span style="color: red;">*</span></label>
        <input type="text" id="account_holder" name="account_holder" required>
        <span class="error" id="holderError"></span>

        <label>Account Number: <span style="color: red;">*</span></label>
        <input type="text" id="account_number" name="account_number" required>
        <span class="error" id="accountError"></span>

        <label>IFSC Code: <span style="color: red;">*</span></label>
        <input type="text" id="ifsc_code" name="ifsc_code" required>
        <span class="error" id="ifscError"></span>

        <div class="button-container">
            <button type="submit" class="btn submit-btn">Submit</button>
            <button type="button" class="btn cancel-btn" onclick="window.location.href='loan_details.php'">Cancel</button>
        </div>
    </form>
</div>

<script>
document.getElementById("bankForm").addEventListener("submit", function(event) {
    let isValid = true;
    let accountNumber = document.getElementById("account_number").value.trim();
    let ifscCode = document.getElementById("ifsc_code").value.trim();

    document.getElementById("accountError").innerText = "";
    document.getElementById("ifscError").innerText = "";

    if (!/^\d+$/.test(accountNumber)) {
        document.getElementById("accountError").innerText = "Account number must be numeric.";
        isValid = false;
    }
    if (!/^[A-Z]{4}0[A-Z0-9]{6}$/.test(ifscCode)) {
        document.getElementById("ifscError").innerText = "Invalid IFSC code format.";
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});
</script>

</body>
</html>
    