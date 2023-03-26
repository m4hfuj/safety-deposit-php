<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="reg-box.css">

  <title>Singuler Box</title>
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


  <div class="container">

    <?php $boxId = $_GET["box-id"];
        echo "<h2>Register Box No. 00$boxId</h2>";
    ?>

    <form action="action-box-register.php" method="post">
      
      <div class="mb-3 row">
        <label for="client-id" class="col-sm-2 col-form-label">Client ID</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="client-id" name="client-id">
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="box-id" class="col-sm-2 col-form-label">Box ID</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="box-id" name="box-id">
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="date" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="date" name="date">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="month" class="col-sm-2 col-form-label">Rent Duration</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="month" name="month">
        </div>
      </div>
      
      <button type="submit" class="btn btn-success" style="margin-top: 30px">Confirm Register</button>

    </form>

  </div>

</body>
</html>
