<!-------------------------------------php coding------------------------------>
<?php
include 'db.php';
$name = $email = $number = $guest = $checkin = $checkout = $address = $room = $city = $state = $pincode = "";
$nameErr = $sucess = $message = "";
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $guest = $_POST["guest"]; 
  $checkin = $_POST["checkin"];
  $checkout = $_POST["checkout"];
  $address = $_POST["address"];
  $room = $_POST["room"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $pincode = $_POST["pincode"];

  if (empty($_POST["name"])) {
    $nameErr ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Error in submitting the data!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>;';
}
else {
  
      $sql = "INSERT INTO `reservation` (`name`, `email`, `number`, `guest`, `checkin`, `checkout`, `address`, `room`, `city`, `state`, `pincode`) 
          VALUES ('$name', '$email', '$number', '$guest', '$checkin', ' $checkout', '$address', '$room', '$city', '$state', '$pincode')";
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
            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error in submitting the data!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>;';
             } 
            }
          }
          // <!-------------------------------------Home page and links------------------------------>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="reservation.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Rservation</title>
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
<section style=" height:900px; background-color:white;">
<span><?php echo $nameErr; ?> </span>
<span><?php echo $sucess; ?> </span>
<span><?php echo $message; ?> </span>
<center><img src="./img/frame.jpg" alt="frame" height="60px" width="300px"></center>
<h2 class="m-2 text-center"> Reservation at Restofry </h2>
<center><img src="./img/frame.jpg" alt="frame" height="60px" width="300px"></center>
<div class="reserv shadow container">
<div class="mx-auto">
<form  method="POST" action="reservation.php" onsubmit="return myfun()">
  <div class="form-group">
    <label for="inputAddress2">Full Name</label>
    <input type="text" class="form-control" id="name" placeholder="Your name" name="name" >
  </div>
  <div class="form-row">
    <div class="form-group col-12 col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-12 col-md-6">
      <label for="number">Mobile No</label>
      <input type="text" id="phone" class="form-control" name="number" placeholder="Mobile No." value=""required>
      <span id="message" style="color:red;"></span>
    </div>
    </div>
    <div class="form-row">
  <div class="form-group col-12 col-md-6">
      <label for="inputEmail4">No of Guest</label>
      <input type="number" class="form-control" id="text" placeholder="Enter No. of Guest" name="guest" max="7" min="1"required>
    </div>
    <div class="form-group col-12 col-md-3">
    <label for="date">Check In</label>
  <input type="date" id="date" name="checkin" required>
    </div>
    <div class="form-group col-12 col-md-3">
    <label for="date">Check Out</label>
  <input type="date" id="date" name="checkout"required>
    </div>
    </div>
    <div class="form-row">
  <div class="form-group col-12 col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-group col-12 col-md-6">
      <label for="inputState">Types of Room</label>
      <select id="inputState" class="form-control"name="room" required>
        <option selected>Choose...</option>
        <option>Luxury Room</option>
        <option>Delux Room</option>
        <option>Suit</option>
        <option>Executive Room</option>
      </select>
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-12 col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-6 col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state">
        <option selected>Choose...</option>
        <option>Maharashtra</option>
        <option>Karnataka</option>
        <option>Goa</option>
        <option>Panjab</option>
        <option>Tamil Nadu</option>
        <option>Kerala</option>
        <option>Bihar</option>
      </select>
    </div>
    <div class="form-group col-6 col-md-2">
      <label for="inputZip">Zip</label>
      <input type="number" class="form-control" id="inputZip" name="pincode"maxlength="6">
    </div>
  </div>
  <button type="submit" name="submit" class="btn mb-2 sub">Submit Booking</button>
</form>
</div>
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