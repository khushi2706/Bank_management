<?php
include './conect.php';
$id = $_GET['id'];
$query = "SELECT * FROM `customer` where `cust_id` = $id;";
$result = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .center
{
  background-color: rgb(252, 252, 252);
  border-radius: 10px;
  box-shadow: 0 0 12px 2px rgba(4, 104, 87, 0.4);
  overflow: hidden;  
}
img
{
    height: 18pc;
}
</style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
    <title>Your Bank</title>
</head>

<body style="font-family: 'Yusei Magic', sans-serif;">
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#00d1b2">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Your Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"href="transection.php" style="color: white;">transfer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="history.php" style="color: white;">history</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5 center p-5">
    <div class="row align-items-center">
    <div class="col" style="text-align: center;">
    <?php 
    if ($res['img'] != null){
      $loc = $res['img'];
      echo '<img src="data:image/png;base64,'.base64_encode($loc).'" style="border-radius: 50% ;"/>';
    }
    else
    {
      echo '<img src="https://www.xovi.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="" style="border-radius: 50% ;">';
    }
     ?>   
      
    </div>
    <div class="col" style="text-align: center;">

      <p><b>Name : </b><?php echo $res['name'] ?></p>
      <p><b>Ac no : </b><?php echo $res['ac_no'] ?></p>
      <p><b>Email : </b><?php echo $res['email'] ?></p>
      <p><b>Balance : </b><?php echo $res['balance'] ?></p>
    
    </div>
  </div>

  </div>
    </div>
</body>
<html>