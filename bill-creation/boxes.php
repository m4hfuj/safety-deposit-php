<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="reg-box.css">

  <title>Register Box</title>
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
            <a class="nav-link active" href="bill-creation/boxes.php">Register Box</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
  
    <h2>Available Boxes</h2>

    <?php 

    include '../connect.php';

    // Prepare the SQL query
    $sql = "SELECT B.id AS bid, B.size AS bsize, B.rent AS brent, B.available AS avail
            FROM Boxes AS B";
    
    $result = $conn->query($sql);
    
    // Check if the query is successful
    if ($result->num_rows > 0) {
      // Output data for each row in the result set

      echo "<table class='table'>";
      echo "<thead><tr>
        <th scope='col'>ID</th>
        <th scope='col'>Box Size</th>
        <th scope='col'>Rent</th>
        <th scope='col'>Register Button</th>
      </tr></thead>";

      echo "<tbody>";

      while($row = $result->fetch_assoc()) {

        $btn_bs = "btn-success";
        
        if ($row["avail"] == 0){
          $btn_bs = "btn-secondary disabled";
        }


        echo "<tr>";
        $boxId = $row["bid"];
        echo "<th scope='col'>". $boxId . "</th>
              <td scope='col'>". $row["bsize"] . "</td>
              <td scope='col'>". $row["brent"] . "</td>
              <td scope='col'>
                <a href='box.php?box-id=" . $boxId . "' class='btn ". $btn_bs ."'>Register</a>
                </td>";
        echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
    } 
    else {
      echo "<h2>0 results</h2>";
    }

    ?>

  </div>

</body>
</html>












<!-- <div class="mb-3 row">
  <label for="bid" class="col-sm-2 col-form-label">Enter Box ID</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="bid" name="bid">
  </div>
</div> -->

<!-- <div class="mb-3 row">
  <label for="box" class="col-sm-2 col-form-label">Box Size</label>
  <div class="col-sm-10">
    <select class="form-select" id="box" name="box">
      <option value="0" selected>Select Box Size</option>
      <option value="1">5.00 inches - $ 200.00</option>
      <option value="2">3.50 inches - $ 150.00</option>
      <option value="3">2.50 inches - $ 100.00</option>
    </select>
  </div>
</div> -->