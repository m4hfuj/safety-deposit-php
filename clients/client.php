<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="a-r-b.css">

  <title>Register Box to Client</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Deposit System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="/safety-deposit-php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="reg-client.html">Register new Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clients/clients-list.php">List of Clients</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="bill-creation/boxes.php">Register Box</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <div class="container" name="run">

    <?php
      include '../connect.php';

      $clientId = $_GET["client-id"];

      echo "<h2>Account Info</h2>";

      include 'query_client.php';

      echo "<h2>Registered Boxes</h2>";

      include 'query_boxes.php';
      
      $stmt->close();
      $conn->close();
    ?>

    <h1>Home</h1>

  </div>



</body>
</html>