<?php include 'user_header.html';?>

<!DOCTYPE html>
<html>
    <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
   
  .mySlides {
    width: 100%;
    display: none; /* hide all images by default */
    height: 80%;
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
.w3-row-padding .w3-third {
  display: inline-block;
  vertical-align: top;
  margin: 0 -4px;
  box-sizing: border-box;
  width: calc(33.33% - 8px);
}

.card {
  border: 1px solid #ccc;
  background-color: #fff;
  padding: 16px;
  border-radius: 4px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: box-shadow 0.3s ease-in-out;
  text-align: center;
}

.card:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}


/* .card {
    display: inline-block;
    width: 300px;
    height: 250px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-right: 20px;
    margin-left:135px;
    margin-top: 20px; /* add margin-top */
  /* margin-bottom: 20px;  */
  /* } */ 
  
  /* .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  } */
  
  .card p {
    font-size: 16px;
    line-height: 1.5;
    margin: 0;
    height: 30px;
    margin-right: 10px;
  }
  
  .card img {
    width: 100%;
    border-radius: 5px;
  }
  a[href^="https://api.whatsapp.com"] img {
  width: 40px;
  height: 40px;
  margin: 10px;
}

</style>
</head>
<body>



<!-- Slide Show -->
<section>
  <img class="mySlides" src="images/logo4.jpg">
  <img class="mySlides" src="images/vehical.jpg">
  <img class="mySlides" src="images/gold.jpg">
</section>

<!-- Band Description -->
<center>
<section class="w3-container w3-center w3-content" style="max-width:600px">
  <h2 class="w3-wide">Loan Management System</h2>
  
  <p class="w3-justify">A loan management system is a digital platform that helps automate every stage of the loan lifecycle,
      from application to closing. The traditional loan management process is meticulous, time-consuming,
      and requires collecting and verifying information about applicants, their trustworthiness,
      and their credibility.</p>
</section>
</center>
<!-- Band Members -->
<section class="w3-row-padding w3-center w3-light-grey">
  <div class="card w3-third">
    <article style="width: 100%;">
      <p>Home Loan</p>
      <img src="images/home1.jpg" alt="Random Name" style="width:100%">
    </article>
  </div>
  <div class="card w3-third">
    <article style="width: 100%;">
      <p>Personal Loan</p>
      <img src="images/personal3.jpg" alt="Random Name" style="width:100%">
    </article>
  </div>
  <div class="card w3-third">
    <article style="width: 100%;">
      <p>Student Loan</p>
      <img src="images/student.jpeg" alt="Random Name" style="width:100%">
    </article>
  </div>
</section>


<footer class="footer">
        <div class="container">
            <div class="row">
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
   <script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

</body>
</html>