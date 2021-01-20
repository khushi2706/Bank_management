<?php
    include './conect.php';
    $query="SELECT `ac_no` FROM `customer`;";
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


<?php 
$data_array = array();
while($data = mysqli_fetch_assoc($result)) {
    $data_array[] = $data;
}
?>

<div class="container mt-5">

<form method="POST" action="">
  <div class="mb-3">
  <div class="m-3">
  <label for="from">from:--</label>
  <select class="form-select" name="from" id="from" aria-label="Default select example" require>
  <option selected disabled>Open this select menu</option>
  <?php foreach ($data_array as $row) { ?>
  <option value="<?php echo $row ['ac_no']?>"><?php echo $row['ac_no'] ?></option>
<?php }?>
</select>
  </div>
<div class="m-3">
  <label for="to">to:--</label>
  <select class="form-select" name="to" id="to" aria-label="Default select example" require>
  <option selected disabled>Open this select menu</option>
  <?php foreach ($data_array as $row) { ?>
  <option value="<?php echo $row ['ac_no']?>"><?php echo $row['ac_no'] ?></option>
<?php }?>
</select>
</div>
<div class="m-3">
<label for="amount">Amount:--</label>
<div class="input-group">
  <input type="text" name ="amount" id="amount" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
  <span class="input-group-text">$</span>
  <span class="input-group-text">0.00</span>
</div>
<div class="mt-3">
  <input type="submit" name="submit" class="btn" onclick="doalert();" style="background-color: #00d1b2;">
</div>
</form>
  
 
</div>

<?php
if (isset($_POST['submit'])) {
    
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
  
    $query="SELECT `balance` FROM `customer` where `ac_no` = $from;";
    $result =mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    $bal = $row['balance'];

    if ((double)$amount < 0 || (double)$amount > $bal) {
        echo '<script>';
        echo ' alert("Please enter correct amount.")';  // showing an alert box.
        echo '</script>';
    }
    else
    {
        $am = (double)$amount;
        $q1 = "UPDATE `customer` SET `balance`=((SELECT `balance` FROM `customer` where `ac_no` = $from) - $am) where `ac_no` = $from;";
        $con->query($q1);
        
        $q2 = "UPDATE `customer` SET `balance`=((SELECT `balance` FROM `customer` where `ac_no` = $to) + $am) where `ac_no` = $to;";
        $con->query($q2);

        $q3 = "INSERT INTO `transition` (`s_ac`, `r_ac`, `amount`) VALUES ($from, $to,$amount);";
        $con->query($q3);
    }
}

?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script>

function doalert()
{
  alert("Your trsection is successfully Done!!")
}
</script>
  

    </body>
  </html>
        