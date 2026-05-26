<?php include 'user_header.html';?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
      
    .card {
    display: inline-block;
    width: 400px;
    height: 500px; 
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-right: 20px;
    margin-left:135px;
    margin-top: 20px; /* add margin-top */
  margin-bottom: 20px; 
  }

  .card img {
    width: 100%;
    height: 60%;
    border-radius: 10px 10px 0 0;
    object-fit: cover;
  }

  .card .card-content {
    padding: 0px;
  }

  .card h2 {
    font-size: 24px;
    margin-top: 0;
    margin-bottom: 10px;
  }

  .card p {
    font-size: 16px;
    line-height: 1.5;
    margin: 0;
    height: 30px;
    margin-right: 10px;
  }
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
h1{
  text-align: center;
}
#borrower{
    background-color:blue;
    height: 40px;
   
}
  
    </style>
</head>
<body>
  <h1>Loans Details</h1>
<div class="card">
  <img src="images/home.jpg" alt="Description of image 1">
  <div class="card-content">
    <h2>Home Loans</h2>
    <p>This is the most common type of home loan availed to purchase a house. 
      You can get up to 80%-90% of the house’s market price in the form of financing.
       The lender will hold  house until you completely repay the loan.</p>
       <br><br><br><br>
       <button  class="btn btn-primary btn-sm col-sm-6"  id="borrower" onclick="location.href='user_details.php'">Borrow</button>
  </div>
</div>
<div class="card">
  <img src="images/business.jpg" alt="Description of image 2">
  <div class="card-content">
    <h2>Business Loans</h2>
    <p>Businesses require an adequate amount of capital to fund startup expenses or pay for expansions. 
      As such,companies take out business loans to gain the financial assistance they need.</p>
      <br><br><br><br>
       <button class="btn btn-primary btn-sm col-sm-6" onclick="location.href='user_details.php'" id="borrower">Borrow</button>
  </div>
</div>

<div class="card">
  <img src="images/gold.jpg" alt="Description of image 3">
  <div class="card-content">
    <h2>Gold Loans</h2>
    <p>Gold loan is a secured loan taken by the borrower from a lender by pledging their gold articles (within a range of 18-24 carats) as collateral.
    For a Gold Loan,bank takes your gold as collateral for  period of the loan.
    </p>
    <br><br><br><br>
       <button class="btn btn-primary btn-sm col-sm-6" onclick="location.href='user_details.php'" id="borrower">Borrow</button>
  </div>
</div>

<div class="card">
  <img src="images/Student.jpeg" alt="Description of image 4">
  <div class="card-content">
    <h2>Students Loans</h2>
    <p>A student loan is a type of loan designed to help students pay for post-secondary education and the associated fees, such as tuition, books and supplies, and living expenses.</p>
    <br><br><br><br>
       <button class="btn btn-primary btn-sm col-sm-6" onclick="location.href='user_details.php'" id="borrower">Borrow</button>
  </div>
</div>

<div class="card">
  <img src="images/personal3.jpg" alt="Description of image 5">
  <div class="card-content">
    <h2>Personal Loans</h2>
    <p>A Personal Loan is an unsecured loan taken by borrowers to meet their varied financial needs. It is also called an ‘All-purpose loan’ at times as there is no restriction on the end use of the funds.</p>
    <br><br><br><br>
       <button class="btn btn-primary btn-sm col-sm-6" onclick="location.href='user_details.php'" id="borrower">Borrow</button>
  </div>
</div>

<div class="card">
  <img src="images/vehical.jpg" alt="Description of image 6">
  <div class="card-content">
    <h2>Vehical Loans</h2>
    <p>A car loan is nothing but the funds that one borrows from a lender for the sole purpose of purchasing a car of his or her choice. 
    With the advancement of latest technologies, life is changing faster and so do the car models.
    </p>
    <br><br><br><br>
       <button class="btn btn-primary btn-sm col-sm-6" onclick="location.href='user_details.php'" id="borrower">Borrow</button>
  </div>
</div>

<footer class="footer">
        <div class="container">
        <div class="footer-col">
            <p>Contact No: <a href="https://api.whatsapp.com/send?phone=9662044760" style="color: white;"><i class="fab fa-whatsapp"></i>9662044760</a></p>
            <p>&copy; 2025 Loan Management System</p>
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