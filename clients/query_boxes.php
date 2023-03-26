
<?php

include '../connect.php';

// Prepare the SQL query
$sql = 
  "SELECT T.box_id AS id, 
    B.size AS size, 
    T.registration_date AS registration_date, 
    T.rent_duration AS rent_duration, 
    B.rent AS box_rent,
    T.billing_amount AS billing_amount
  FROM Transactions AS T
  LEFT JOIN Clients AS C ON T.client_id = C.id
  LEFT JOIN Boxes AS B ON T.box_id = B.id
  WHERE C.id = $clientId
  ORDER BY T.box_id";

$result = $conn->query($sql);

// Check if the query is successful
if ($result->num_rows > 0) {
  // Output data for each row in the result set

  echo "<table class='table table-bordered table-striped'>";
  echo "<thead><tr class='table-dark'>
    <th scope='col'>ID</th>
    <th scope='col'>Size</th>
    <th scope='col'>Box Rent</th>
    <th scope='col'>Registration date</th>
    <th scope='col'>Rent Duration</th>
    <th scope='col'>Billing Amount</th>
  </tr></thead>";

  echo "<tbody>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    $bid = $row["id"];
    echo "<th scope='col'>". $bid . "</th>";
    echo "<td scope='col'>". $row["size"] . "</td>";
    echo "<td scope='col'> $ ". $row["box_rent"] . "</td>";
    echo "<td scope='col'>". $row["registration_date"] . "</td>";
    echo "<td scope='col'>". $row["rent_duration"] . " months</td>";
    echo "<td scope='col'> $ ". $row["billing_amount"] . "</td>";

  }

  echo "</tbody>";
  echo "</table>";
} 
else {
  echo "<h2>0 results</h2>";
}
?>

