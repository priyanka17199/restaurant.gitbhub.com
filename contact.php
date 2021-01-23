<!-------------------------------------php coding------------------------------>
<?php
include 'db.php';
$name = $email = $number = $message = "";
$nameErr = $sucess = $messager = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $message = $_POST["message"]; 
 
   
  if (empty($_POST["name"])) {
    $nameErr ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> All field should submitt !</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>;';
}
 else {
  $sql = "INSERT INTO `contact` (`name`, `email`, `number`, `message`) 
          VALUES ('$name', '$email', '$number', '$message')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            $sucess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Imformation submitted successfully!</strong> You should check in on some of those fields below.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
           </div>;';
           }
          else{
            $messager = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error in submitting the data!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>;';
             }  
         }       
 }
 
?>
<!-------------------------------------Home page and links------------------------------>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Contact Us</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="100">

  <!-------------------------------------Navigation Bar------------------------------>
  <section>
  <header>  
      <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <img src="./img/logo1.jpg" alt="logo" width="70px" height="70px" class="logo">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Dining</a>
              </li>  
              <li class="nav-item">
                  <a class="nav-link" href="gallery.php">Gallery</a>
                </li>  
              <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
              </li>  
              <a href="reservation.php"><button type="button" class="btn btn-outline-danger m-2">Reservation</button></a> 
            </ul>
          </div>  
        </nav>
</header>
</Section>
<!--------------------------------------- section --------------------------------------------------->
<section style="height:500px;">
  
</section>
<!--------------------------------------- Form --------------------------------------------------->
<section style="height:auto; background-color:white;">
<span><?php echo $nameErr; ?> </span>
<span><?php echo $sucess; ?> </span>
<span><?php echo $messager; ?> </span>
<center><img src="./img/frame.jpg" alt="frame" height="60px" width="300px"></center>
<h2 class="m-2 text-center"> Enquire Now </h2>
<center><img src="./img/frame.jpg" alt="frame" height="60px" width="300px"></center>
<div class="shadow reserv container col-12 col-md-6 mx-auto  m-2">
<form method="POST" action="contact.php" onsubmit="return myfun()">
  <div class="form-group">
    <label for="inputAddress2">Full Name</label>
    <input type="text" class="form-control" id="name" placeholder="Your name" name="name">
  </div>
  <div class="form-row">
    <div class="form-group col-12 col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-12 col-md-12">
      <label for="tel">Mobile No</label>
      <input type="text" id="phone" class="form-control" name="number" placeholder="Mobile No." value="" required>
      <span id="message" style="color:red;"></span>
    </div>
    </div>
    <div class="form-row">
  <div class="form-group col-12 col-md-12">
  <textarea name="message" rows="10" cols="88">
       Enter your message
</textarea>
    </div>
  </div>
  <button type="submit" class="btn mb-2 sub">Send Message</button>
</form>
</div>
</section>
<!--------------------------------------- footer --------------------------------------------------->
<section>
        <div class=" footer text-center ">
<h6 style="color: aliceblue; line-height: 50px;">Copyrights © OurFurniture . All Rights Reserved</h6>
        </div>
</section>
<!--------------------------------------- javascript --------------------------------------------------->
<script>
function myfun () {
  var a = document.getElementById('phone').value;
  if (a=="") {
    document.getElementById('message').innerHTML="** Please fill Mobile No";
    return false;
  }
  if (isNaN(a)) {
    document.getElementById('message').innerHTML="** Only Numeric are allowed";
    return false;
  }
  if (a.length>10) {
    document.getElementById('message').innerHTML="** Mobile number must be 10 digit";
    return false;
  }
  if (a.length<10) {
    document.getElementById('message').innerHTML="** Mobile number must be 10 digit";
    return false;
  }
  if ((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7)) {
    document.getElementById('message').innerHTML="** Please Enter Valid Mobile No";
    return false;
  }
}

</script>
</body>
</html>