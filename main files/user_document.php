<html>
  <head>
    <style>
      /* CSS for the card container */
      .card {
        width: 35%;
        margin: 0 auto;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      /* CSS for the form labels */
      label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: bold;
        float: left;
      }

      /* CSS for the form inputs */
      input[type="file"] {
        margin-bottom: 10px;
        margin-left: 15px;
      }

      /* CSS for the form submit and cancel buttons */
      input[type="submit"],
      input[type="button"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
      }

      input[type="submit"]:hover,
      input[type="button"]:hover {
        background-color: #3e8e41;
      }

      input[type="number"],
      select {
        width: 70%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
      }
    </style>
    <script>
      function validateForm() {
        let borrower = document.getElementById("borrower_id").value;
        let files = document.querySelectorAll("input[type='file']");
        let isValid = true;

        if (borrower === "") {
          alert("Please select a borrower.");
          return false;
        }

        files.forEach((file) => {
          if (file.files.length === 0) {
            alert("Please upload all required files.");
            isValid = false;
          }
        });

        return isValid;
      }
    </script>
  </head>
  <body>
    <?php
    include ('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $borrower_id = $_POST['borrower_id'];

        // Validate borrower selection
        if (empty($borrower_id)) {
            echo "<script>alert('Please select a borrower.'); window.location.href = 'user_document.php';</script>";
            exit();
        }

        // Required files array
        $required_files = ["aadhar_card", "pan_card", "electricity_bill", "incomeTax_returns", "income_certificate", "Bean_Reserve"];
        
        // Validate file uploads
        foreach ($required_files as $file) {
            if (empty($_FILES[$file]["name"])) {
                echo "<script>alert('Please upload all required files.'); window.location.href = 'user_document.php';</script>";
                exit();
            }
        }

        // File upload handling
        $target_dir = "uploads/";
        $file_paths = [];

        foreach ($required_files as $file) {
            $file_name = $_FILES[$file]["name"];
            $file_tmp = $_FILES[$file]["tmp_name"];
            $file_path = $target_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $file_path)) {
                $file_paths[$file] = $file_name;
            } else {
                echo "<script>alert('Error uploading $file_name.'); window.location.href = 'user_document.php';</script>";
                exit();
            }
        }

        // Insert into database
        $sql = "INSERT INTO upload (borrower_id, aadhar_card, pan_card, electricity_bill, incomeTax_returns, income_certificate, Bean_Reserve)
                VALUES ('$borrower_id', '{$file_paths['aadhar_card']}', '{$file_paths['pan_card']}', 
                        '{$file_paths['electricity_bill']}', '{$file_paths['incomeTax_returns']}', 
                        '{$file_paths['income_certificate']}', '{$file_paths['Bean_Reserve']}')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Details added successfully.'); window.location.href = 'user_home.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>

    <center>
      <div class="card">
        <h1>Add Details</h1>
        <form action="user_document.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
          <label for="name">Name:</label>
          <?php
          $borrower = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM borrowers ORDER BY concat(lastname,', ',firstname,' ',middlename) ASC");
          ?>
          <select name="borrower_id" id="borrower_id" class="custom-select browser-default select2" required>
            <option value="">Select Borrower</option>
            <?php while($row = $borrower->fetch_assoc()): ?>
              <option value="<?php echo $row['id'] ?>">
                <?php echo $row['name'] . ' | Tax ID: ' . $row['tax_id'] ?>
              </option>
            <?php endwhile; ?>
          </select>
          <br><br>

          <div>
            <label for="aadharUpload"><b>Aadhar Card : <span style="color: red;">*</span></b></label>
            <input type="file" name="aadhar_card" id="aadharUpload" required>
          </div><br>

          <div>
            <label for="panUpload"><b>Pan Card : <span style="color: red;">*</span></b></label>
            <input type="file" name="pan_card" id="panUpload" required>
          </div><br>

          <div>
            <label for="electricityUpload"><b>Electricity Bill : <span style="color: red;">*</span></b></label>
            <input type="file" name="electricity_bill" id="electricityUpload" required>
          </div><br>

          <div>
            <label for="incomeTaxUpload"><b>Income Tax Returns : <span style="color: red;">*</span></b></label>
            <input type="file" name="incomeTax_returns" id="incomeTaxUpload" required>
          </div><br>

          <div>
            <label for="incomeCertificateUpload"><b>Income Certificate : <span style="color: red;">*</span></b></label>
            <input type="file" name="income_certificate" id="incomeCertificateUpload" required>
          </div><br>

          <div>
            <label for="beanReserveUpload"><b>Bean Reserve Certificate : <span style="color: red;">*</span></b></label>
            <input type="file" name="Bean_Reserve" id="beanReserveUpload" required>
          </div><br>

          <div>
            <input type="submit" value="Upload">
            <input type="button" value="Cancel" onclick="window.location.href='loan_details.php'">
          </div>
        </form>
      </div>
    </center>
  </body>
</html>
