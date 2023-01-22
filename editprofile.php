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
     $major = "";
     $score10= "";
     $score12= "";
     $message="";
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
          $major =$rowData["major"];
          $score10 =$rowData["10score"];
          $score12 =$rowData["12score"];
          $gender=$rowData["gender"];
          }}

        if(empty($about)){
            $about="brif bio about yourself";
        }
       
        if(empty($exp)){
            $exp=" experince";
        }
        if(empty($edu)){
            $edu="education";
        }

        if(empty($skills)){
            $skills="your skillset";
        }
        if(empty($awards)){
            $awards="awards you earn";
        }
        if(empty($major)){
            $major="your major field of study";
        }
        if(empty($score10)){
            $score10="write your grade 10 scores";
        }
        if(empty($score12)){
            $score12="write your grade 12 scores";
        }

        if(empty($gender)){
          $gender="male or female";
        }
        ?>
    <?php
    require 'db_connection.php';
    $email=$_SESSION['login_id'];
    if(isset($_POST['becometutor'])){
     $about= mysqli_real_escape_string($db_connection, $_POST['about']);
     $exp= mysqli_real_escape_string($db_connection, $_POST['exp']);
     $edu= mysqli_real_escape_string($db_connection, $_POST['education']);
     $skills= mysqli_real_escape_string($db_connection, $_POST['skills']);
     $awards= mysqli_real_escape_string($db_connection, $_POST['awards']);
     $major= mysqli_real_escape_string($db_connection, $_POST['major']);
     $score10= mysqli_real_escape_string($db_connection, $_POST['10score']);
     $score12= mysqli_real_escape_string($db_connection, $_POST['12score']);
     $gender= mysqli_real_escape_string($db_connection, $_POST['gender']);


          $fileName = basename($_FILES["file1"]["name"]); 
          $imageTemp = $_FILES["file1"]["tmp_name"];
          // Valid extension
          $valid_ext = array('png','jpeg','jpg');

          // Location
          $location =  "images/".$fileName;;

          // file extension
           $file_extension = pathinfo($location, PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension);

  function compressImage($source, $destination, $quality) {
   $info = getimagesize($source);
   if ($info['mime'] == 'image/jpeg') 
     $image = imagecreatefromjpeg($source);
   elseif ($info['mime'] == 'image/gif') 
     $image = imagecreatefromgif($source);
   elseif ($info['mime'] == 'image/png') 
     $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
 
 }


  // Check extension
  if(in_array($file_extension,$valid_ext)){
    // Compress Image
   compressImage($imageTemp,$location,60);
  }else{
    echo "Invalid file type. only png jpeg jpg images are allowed";
  }
    $sql = "UPDATE profile SET about='$about', exps='$exp' ,education='$edu' ,skills='$skills' ,awards='$awards' ,major='$major' ,images='$fileName',10score='$score10' ,12score='$score12' ,gender='$gender' WHERE email='$email'";
     if (mysqli_query($db_connection, $sql)) {
        header("Location: home.php");
    } else {
      echo " ";
    }
    }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
      .form-style-9{
        max-width: 800px;
        background: #FAFAFA;
        padding: 30px;
        margin: 50px auto;
        box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
        border-radius: 10px;
        border: 6px solid #305A72;
      }
      .form-style-9 ul{
        padding:0;
        margin:0;
        list-style:none;
      }
      .form-style-9 ul li{
        display: block;
        margin-bottom: 10px;
        min-height: 35px;
      }
      .form-style-9 ul li  .field-style{
        box-sizing: border-box; 
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box; 
        padding: 8px;
        outline: none;
        border: 1px solid #B0CFE0;
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
      
      }.form-style-9 ul li  .field-style:focus{
        box-shadow: 0 0 5px #B0CFE0;
        border:1px solid #B0CFE0;
      }
      .form-style-9 ul li .field-split{
        width: 49%;
      }
      .form-style-9 ul li .field-full{
        width: 100%;
      }
      .form-style-9 ul li input.align-left{
        float:left;
      }
      .form-style-9 ul li input.align-right{
        float:right;
      }
      .form-style-9 ul li textarea{
        width: 100%;
        height: 100px;
      }
      .form-style-9 ul li input[type="button"], 
      .form-style-9 ul li input[type="submit"] {
        -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
        -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
        box-shadow: inset 0px 1px 0px 0px #3985B1;
        background-color: #216288;
        border: 1px solid #17445E;
        display: inline-block;
        cursor: pointer;
        color: #FFFFFF;
        padding: 8px 18px;
        text-decoration: none;
        font: 12px Arial, Helvetica, sans-serif;
      }
      button{
        -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
        -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
        box-shadow: inset 0px 1px 0px 0px #3985B1;
        background-color: #216288;
        border: 1px solid #17445E;
        display: inline-block;
        cursor: pointer;
        color: #FFFFFF;
        padding: 8px 18px;
        text-decoration: none;
        font: 12px Arial, Helvetica, sans-serif;

      }
      .form-style-9 ul li input[type="button"]:hover, 
      .form-style-9 ul li input[type="submit"]:hover {
        background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
        background-color: #28739E;
      }
      </style>
  </head>
  <body>
    <form class="form-style-9" method="post" action="" enctype="multipart/form-data">
      <ul>
      <li> 
        <textarea name="about" class="field-style field-split align-right" placeholder="about"><?php echo $about; ?></textarea>
        <textarea name="exp" class="field-style field-split align-right" placeholder="experince"><?php echo $exp; ?> </textarea>
       
      </li>
      <li>
        <textarea name="education" class="field-style field-split align-right" placeholder="educations"> <?php echo $edu; ?></textarea>
        <textarea name="skills" class="field-style field-split align-right" placeholder="skills"> <?php echo $skills; ?></textarea>
        </li>
        <li>
          <textarea name="awards" class="field-style field-split align-right" placeholder="awards"><?php echo $awards; ?></textarea>
          <input  type="text" name="major" class="field-style field-split align-left" placeholder="major"  value="<?php echo $major;?>"/>
        </li>
       
        <li>
        <input  type="text" name="10score" class="field-style field-split align-left" placeholder="grade 10 score" value="<?php echo $score10;?>"/>
        <input  type="text" name="12score" class="field-style field-split align-left" placeholder="grade 12 score" value="<?php echo $score12;?> "/>
        </li>

        <li>
        <input  type="text" name="gender" class="field-style field-split align-left" placeholder="male or female" value="<?php echo $gender;?>"/>

        </li>

       <label for="username">profile picture:</label>
       <input type="file" name="file1" value="">

      <li><br>
      <button  value="Send Message" name="becometutor">Become tutor</button>
      </li>
      </ul>
      </form>
  </body>
  </html>