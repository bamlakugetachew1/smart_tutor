<?php
   require 'db_connection.php';
   $email=$_GET['email'];
   $about="";
   $exp="";
   $edu="";
   $skills="";
   $awards="";
   $images="";
   $message="";
   $concat="images/";
   $gender="";
   $score10="";
   $score12="";
   $get_profile = mysqli_query($db_connection, "SELECT * FROM profile WHERE email='$email' LIMIT 1");
   if(mysqli_num_rows($get_profile) > 0){
	while($rowData = mysqli_fetch_array($get_profile)){
        $about=$rowData["about"];
        $exp=$rowData["exps"];
        $edu=$rowData["education"];
        $skills=$rowData["skills"];
        $awards=$rowData["awards"];
        $images=$rowData["images"];
		$email=$rowData["email"];
        $concat=$concat.$images;
        $gender=$rowData["gender"];
        $score10=$rowData["10score"];
        $score12=$rowData["12score"];
        }}

       else{

        $sql = "INSERT INTO `profile`(`about`,`exps`,`education`,`skills`,`awards`,`images`,`email`) VALUES('$about', '$exp', '$edu','$skills','$awards','$images','$email')";
        if(mysqli_query($db_connection, $sql)){
            
        } else{  
        }
        $message="IF YOU HAVEN'T CREATE PROFILE YET PLEASE CREATE  YOUR PROFILE IN THE EDIT OR CREATE SECTION";
      }
?>
<?php

  require 'db_connection.php';
  $result="";
  if(isset($_POST['send'])){
  $sendername = mysqli_real_escape_string($db_connection, $_POST['name']);
  $senderemail = mysqli_real_escape_string($db_connection, $_POST['email']);
  $subject = mysqli_real_escape_string($db_connection, $_POST['subject']);
  $message = mysqli_real_escape_string($db_connection, $_POST['message']);
  $insert = mysqli_query($db_connection, "INSERT INTO message (sendernme, senderemail,subject,message,reciveremail) 
  VALUES('$sendername', '$senderemail', '$subject','$message','$email')");
  if($insert){
    $result="message sent to tutors successfully thanks for using our service";
   }
  else{
    $result="something went wrong please try again";
  }
   }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMART IQ Users Dashboards</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <link href="css/resume.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->

 <style>
 button{
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff; 
  padding-bottom:20px;
}
.result{
    font-size:25px;
    font-family:serif;
    text-align:center;
}
</style>
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src=" <?php echo $concat; ?>" alt="">
        </span>
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Education</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#scores">Scores</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#hireme">Hire Me</a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
    <p class="result"><?php echo $result; ?></p>


      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
                      </div>
          <p class="mb-5"><?php echo $about; ?></p>
          <ul class="list-inline list-social-icons mb-0">
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Experience</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <p><?php echo $exp; ?></p>
            </div>
          </div>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h2 class="mb-5">Education</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0"><?php echo $edu;?></h3>
              </div>
             </div>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
          <h2 class="mb-5">skills</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0"><?php echo $skills;?></h3>
              </div>
             </div>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
          <h2 class="mb-5">Awards &amp; Certifications</h2>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              <?php echo $awards; ?></li>
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="scores">
        <div class="my-auto">
          <h2 class="mb-5">grade 10&amp; grade 12 scores</h2>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i><span>Grade 10</span><br>
              <?php echo $score10; ?>
            </li>
            
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i><span>Grade 12</span><br>
              <?php echo $score12; ?>
            </li>
             
          </ul>
        </div>
      </section>


       
    <!-- ======= Contact Section ======= -->
    <section id="hireme" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>HIRE </h2> <span> <?php echo $email;?></span>
        </div>
        <div class="row mt-5">

<div class="col-lg-4">
  <div class="info">
    <div class="address">
      <i class="bi bi-geo-alt"></i>
      <h4>SMART IQ</h4>
      <p>Only Top Tutors</p>
    </div>
  </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" name="email" class="form-control" id="name" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="send">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
  </body>
</html>
