 <?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script type = \"text/javascript\">
                  alert(\"You must login first\");
                window.location = (\"index.php\")
      </script>";
}
?>

<?php require_once "Includes/server.php"; ?>
<?php 
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($db, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/3695790714.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/favicon-16x16.png">
  <link rel="stylesheet" href="CSS/styles.css">
  <title>Welcome, <?php  echo $_SESSION["username"]; ?></title>

</head>
<body>

  <header>
    <?php
    include('Includes/header.php');
    ?>
  </header>

  <!-- Sliding images -->
  <?php
  include('Includes/carousel.php');
  ?>

  <!-- container marketing -->
  <div class="container marketing d-flex justify-content-center py-5 mt-5 mb-3">
    <div class="row py-4">
      <div class="col-lg-4 ">
        <img class="img-circle" src="images/explore.png" alt="Explore">
        <h2 class="mt-2 text-center">Explore</h2>
        <p>
          <a type="button" style="font-weight: bold;" class="btn btn-outline-dark" href="carvarieties.php" role="button">View details >></a>
        </p>
      </div>

      <div class="col-lg-4 ">
        <img class="img-circle" src="images/contact.png" alt="Contact">
        <h2 class="mt-2 text-center">Contact</h2>
        <p>
          <a type="button" style="font-weight: bold;" class="btn btn-outline-dark" href="contact.php" role="button">View details >></a>
        </p>
      </div>
      <div class="col-lg-4">
        <img class="img-circle" src="images/about.jpg" alt="about us">
        <h2 class="mt-2 text-center">AboutUs</h2>
        <p>
          <a type="button" style="font-weight: bold;" class="btn btn-outline-dark" href="aboutus.php" role="button">View details >></a>
        </p>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
    <?php
      include('includes/footer.php');
    ?>
  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
</body>

</html>