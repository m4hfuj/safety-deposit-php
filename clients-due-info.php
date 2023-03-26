<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="reg-client.css">
  <title>Clients Due Info</title>
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
            <a class="nav-link" href="/deposit">Home</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <div class="container">

  <h1>Clients Due Info</h1>

  <?php
  
    include 'connect.php';

    // Prepare the SQL query
    $sql = "SELECT
      `C`.`id` AS `client_id`,
      `C`.`name` AS `client_name`,
      `C`.`email` AS `client_email`,
      SUM(`S`.`rent`) AS `total_due`
      FROM
          `safety_deposit`.`Bill` `I`
      JOIN `safety_deposit`.`Box` `B`
      JOIN `safety_deposit`.`Client` `C`
      JOIN `safety_deposit`.`Size` `S`
      WHERE
          `I`.`box_id` = `B`.`id` AND `B`.`client_id` = `C`.`id` AND `B`.`size_id` = `S`.`size_id` AND `I`.`status` = 0
      GROUP BY
          `C`.`id`";
      

    $result = $conn->query($sql);
    
    // Check if the query is successful
    if ($result->num_rows > 0) {
      // Output data for each row in the result set

      echo "<table class='table'>";
      echo "<thead><tr>
        <th scope='col'>ID</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Total Due</th>
      </tr></thead>";
      
      echo "<tbody>";

      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th scope='col'>". $row["client_id"] . "</th>";
        echo "<td scope='col'>". $row["client_name"] . "</td>";
        echo "<td scope='col'>". $row["client_email"] . "</td>";
        echo "<td scope='col'> $ ". $row["total_due"] . "</td>";
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