<?php
$gender="";
$location="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$gender = $_POST['gender'];
$location = $_POST['location'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
     @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
* {
  box-sizing: border-box;
}
body {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  background-color: #f7f8fc;
  font-family: "Roboto", sans-serif;
  color: #10182f;
  padding-top:30px;

}
.container {
  display: flex;
  width: 1040px;
  justify-content: space-evenly;
  flex-wrap: wrap;
}
.contianer1{
    padding-top:50px;
}
.card {
  margin: 10px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  width: 300px;
}
.card-header img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}
.card-body {
  display: flex;
  flex-direction: column;
    justify-content: center;

  align-items: flex-start;
  padding: 20px;
  min-height: 250px;
}

.tag {
  background: #cccccc;
  border-radius: 50px;
  font-size: 12px;
  margin: 0;
  color: #fff;
  padding: 2px 10px;
  text-transform: uppercase;
  cursor: pointer;
}
.tag-teal {
  background-color: #47bcd4;
}
.tag-purple {
  background-color: #5e76bf;
}
.tag-pink {
  background-color: #cd5b9f;
}

.card-body p {
  font-size: 13px;
  margin: 0 0 40px;
}
.user {
  display: flex;
  margin-top: auto;
}

.user img {
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin-right: 10px;
}
.user-info h5 {
  margin: 0;
}
.user-info small {
  color: #545d7a;
}

 </style>
</head>
<body>
  <?php 
     require 'db_connection.php';
     $about="";
     $skills="";
     $images="";
     $major = "";
     $concat="images/";

     $sql = "SELECT  * from profile WHERE gender LIKE '$gender[0]%'";
     $res_data = mysqli_query($db_connection,$sql);
     while($rowData = mysqli_fetch_array($res_data)){
        $about=$rowData["about"];
        $skills=$rowData["skills"];
        $images=$rowData["images"];
        $email=$rowData["email"];
        $major =$rowData["major"];
        $concat=$concat.$images;
     echo  '<div class="card">';
     echo   '<div class="card-body">';
     echo "<h4>$skills</h4>";
     echo   "<p>$about</p>";
     echo  '<div class="user">';
     echo "<img src='".$concat."' alt='tutors images'>";
     echo '<div class="user-info">';
     echo  "<h5>$major</h5>";
     echo  "<a href='detailprofile.php?email=$email'>viewprofile</a>";
     echo '</div>';
     echo  '</div>';
     echo  '</div>';
     echo  '</div>'; 
}
?>
</body>
</html>