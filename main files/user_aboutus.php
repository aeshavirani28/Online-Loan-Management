<?php include 'user_header.html';?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<style>
	/*	body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}*/

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

.card img {
  width: 100%; /* Ensures the image fills the card width */
  height: 400px; /* Set a fixed height for all images */
  object-fit: cover; /* Ensures the image covers the set dimensions without distortion */
}


@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
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
</head>
<body>
<div class="about-section">
  <h1>About Us</h1>
  <p><h2>A better experience for lenders, better products for borrowers.</h2></p>
  <p>A loan management system (LMS) is a digital platform that helps lenders manage loans from application to repayment.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="images\girl 1.png" alt="Jensi" style="width:100%">
      <div class="container">
        <h2>Jensi vaghani</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jensi@example.com</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images\girl 2.jpg" alt="Aesha" style="width:100%">
      <div class="container">
        <h2>Aesha Virani</h2>
        <p class="title">Chief Financial Officer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>aesha@gmail.com</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images\girl 3.jpg" alt="Purvisha" style="width:100%">
      <div class="container">
        <h2>Purvisha Nakrani</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>purvisha@example.com</p>
        
      </div>
    </div>
  </div>
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
