<?php
 session_start();
 if(!isset($_SESSION['login_id'])){
   header("Location:login.php");
   }
   require 'db_connection.php';
   $email=$_SESSION['login_id'];
   $about="";
   $exp="";
   $edu="";
   $skills="";
   $awards="";
   $images="";
   $message="";
   $concat="images/";
   $gender="";
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
            }}
       else{
        $sql = "INSERT INTO `profile`(`about`,`exps`,`education`,`skills`,`awards`,`images`,`email`) VALUES('$about', '$exp', '$edu','$skills','$awards','$images','$email')";
        if(mysqli_query($db_connection, $sql)){
            
        } else{
            
        }
        $message="IF YOU HAVEN'T CREATE PROFILE YET PLEASE CREATE  YOUR PROFILE IN THE EDIT OR CREATE SECTION";
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
    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

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
            <a class="nav-link js-scroll-trigger" href="editprofile.php">Edit/Create Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
         <div class="subheading mb-5"><?php echo $message; ?>
          <div class="subheading mb-5"><?php echo $_SESSION['login_id']; ?>
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
