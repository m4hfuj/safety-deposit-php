<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="reg-client.css"> -->
  <title> List of CLients </title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> Deposit System </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="/safety-deposit-php"> Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reg-client.html"> Register new Client </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="clients/clients-list.php"> List of Clients </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="bill-creation/boxes.php"> Register Box </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <h1>List of Clients</h1>

    <?php

    include '../connect.php';

    // Prepare the SQL query
    $sql = 
      "SELECT C.id AS `id`, 
        C.name AS `name`, 
        C.email AS `email`, 
        E.name AS `emp_name`
      FROM Clients AS C 
      JOIN Employees AS E ON C.emp_id = E.id
      ORDER BY C.id";
    
    $result = $conn->query($sql);
    
    // Check if the query is successful
    if ($result->num_rows > 0) {
      // Output data for each row in the result set

      echo "<table class='table'>";
      echo "<thead><tr>
        <th scope='col'>ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Handler</th>
        <th scope='col'>Box Info</th>
      </tr></thead>";

      echo "<tbody>";

      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        $clientId = $row["id"];
        echo "<th scope='col'>". $clientId . "</th>";
        echo "<td scope='col'>". $row["name"] . "</td>";
        echo "<td scope='col'>". $row["email"] . "</td>";
        echo "<td scope='col'>". $row["emp_name"] . "</td>";
        echo "<td scope='col'>
        <a href='client.php?client-id=" . $clientId . "' class='btn btn-info'>Click</a>
        </td>";
        echo "</tr>";
      }

      echo "</tbody>";
      echo "</table>";
    } 
    else {
      echo "<h2>0 results</h2>";
    }

    $stmt->close();
    $conn->close();
    ?>

  </div>

</body>
</html>