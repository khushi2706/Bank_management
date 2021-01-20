<?php
    include './conect.php';
    $query="SELECT * FROM `transition`";
    $result =mysqli_query($con,$query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
<style>
.link
{
  text-decoration: none;
  color:  rgb(7, 116, 70);
}
.center
{
  background-color: rgb(252, 252, 252);
  border-radius: 10px;
  box-shadow: 0 0 12px 2px rgba(4, 104, 87, 0.4);
  overflow: hidden;  
}

</style>
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


<div class="container mt-5 p-2 center">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sender</th>
      <th scope="col">Reciver</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
  
  <?php while($row = mysqli_fetch_assoc($result))
             {?>
    <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['s_ac'] ?></td>
      <td><?php echo $row['r_ac']?></td>
      <td><?php echo $row['amount']?></td>
    </tr>
          <?php   }?>
  </tbody>
</table>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>