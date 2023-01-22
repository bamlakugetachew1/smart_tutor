<?php
require 'db_connection.php';
if(isset($_POST['send'])){ 
$sendername = mysqli_real_escape_string($db_connection, $_POST['name']);
$senderemail = mysqli_real_escape_string($db_connection, $_POST['email']);
$subject = mysqli_real_escape_string($db_connection, $_POST['subject']);
$message = mysqli_real_escape_string($db_connection, $_POST['message']);
$insert = mysqli_query($db_connection, "INSERT INTO message (sendernme, senderemail,subject,message) 
VALUES('$sendername', '$senderemail', '$subject','$message')");
if($insert){
 echo '<script>alert("Your Message Has Been sent")</script>';
}

else{
 echo '<script>alert("Something went wrong please try again")</script>';
}

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SMART IQ  HOME OF ETHIOPIANS TUTORS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

   <style>
/* Button used to open the contact form - fixed at the bottom of the page */

@import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
.center{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display:none;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}


@media screen and (max-width: 799px) {
  .center .inputbox {
  position: relative;
  width: 150px;
  height: 30px;
  margin-bottom: 30px;
}
}

@media screen and (max-width: 799px) and (min-width:650){
  .center .inputbox {
  position: relative;
  width: 180px;
  height: 35px;
  margin-bottom: 30px;
}
} 




.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}

select{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}

.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}

.center .inputbox [type="submit"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}

.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">SMART IQ</a></h1>
     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li> <a class="nav-link scrollto" href="login.php" style="color:red">Login</a></li>
          <li> <a class="nav-link scrollto" href="signup.php"  style="color:red">Sign up</a></li>
          <li><button class="getstarted scrollto" onClick="openForm()">Get Started</button></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

     

  <div class="center" id="myForm">
  <h1>FIND TUTORS</h1>
  <form method="post" action="findtutors.php">
  <p>Gender</p>

        <div class="inputbox">
        <select name="gender">
        <option >Male</option>
        <option >Female</option>
      </select>
    </div>
    <p>Location</p>
    <div class="inputbox">
         <select name="location">
        <option>gebeya</option>
        <option>minharya</option>
        <option >kambo</option>
        <option >gumweha</option>
        <option >allarea</option>
      </select> </div>

    <div class="inputbox">
      <input type="submit" value="Find">
    </div>

    <div class="inputbox">
    <input type="button" value="Close" onClick="closeForm()">
    </div>
  </form>
</div>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>SMART IQ home of tutors</h1>
          <h2>We are team of talented educators</h2>
        </div>
      </div>
      <div class="text-center">
        <button  class="btn-get-started scrollto" onClick="openForm()">Get Started</button>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">SEARCH BASED ON YOUR NEEDS</a></h4>
            <p class="description">After hitting the search button, you can filter the results to find your perfect tutor. You can filter by price, subject, grade level, and schedule</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">CHOOSE THE TUTOR YOU WANT</a></h4>
            <p class="description">Every tutor's profile has a name, profile picture, education background, service price and elevator pitch as to why they are the best tutor for the subject you want help with. This makes it ideal for you to find the perfect tutor.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">HIRE YOUR PERFECT TUTOR</a></h4>
            <p class="description">After you get the tutor you like, you just click a button to hire him/her and we will take care of the rest. In the rare case where you are not able to find the tutor you want we will personally find them for you. Just let us know!</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="ri-fingerprint-line"></i></div>
            <h4 class="title"><a href="">Only The Top Tutors</a></h4>
            <p class="description">Our tutors have scored 4.0 in 10th grade and 500+ in 12th grade National Exams. Moreover, we conduct a very rigorous screening and interviewing procedure to select on the very best</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>At SMART IQ , we believe parents who want to hire tutors or students who seek tutoring should get an easy and convenient access to find top quality tutors. Hence, we have build the first online platform in Ethiopia that connects parents/students who seek tutoring service with top tutors based on their needs</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              ALWAYS TOP CANDIDATE
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> 4.00 in grade 10</li>
              <li><i class="ri-check-double-line"></i>500+ in 12</li>
              <li><i class="ri-check-double-line"></i> High achiver in university</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>              Come and See our best tutors they are qualified 100%

            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

      

    
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
          <h3>Interested to Join us?</h3>
          <h4> Do you have an expertise in a subject, and are you great at explaining it to others?</h4>
          <p>If you answered yes, then join us today to become one of our tutors. You get to help others succeed in their academics and get paid for your hard work.</p>

          <a class="cta-btn" href="login.php">JOIN US</a>
        </div>
      </div>
    </section><!-- End Cta Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              MOTTA,4*4, MOTTAMARKET<br><br>
              <strong>Phone:</strong>
              <p><a href="tel:0974458838">0974458838</a></p><br>
              <strong>Email:</strong> 
              <p><a href="mailto:abuyeget@gmail.com">abuyeget@gmail.com</a></p><br>
            </p>

          </div>


          
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Developed by</h4>
            <p> Dream Inc<br><br>
            <p>we develope a  software and web solutions contct us</p>
            <strong>Phone:</strong>
              <p><a href="tel:0974458838">0974458838</a></p><br>
              <strong>copyright</strong>
              <p>2022</p><br>
             
            </p>

          </div>
          


          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About SMART IQ</h3>
            <p>At SMART IQ , we believe parents who want to hire tutors or students who seek tutoring should get an easy and convenient access to find top quality tutors. Hence, we have build the first online platform in Ethiopia that connects parents/students who seek tutoring service with top tutors based on their needs.</p>

</div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function openForm() {
  document.getElementById("myForm").style.display = "flex";
  window. scrollTo(0, 0);
       }

  function closeForm() {
  document.getElementById("myForm").style.display = "none";
    }
    </script>

</body>

</html>