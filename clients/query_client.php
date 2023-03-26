<?php

include '../connect.php';

// Prepare the SQL query
$sql = 
"SELECT 
  C.id AS `id`, 
  C.name AS `name`,
  C.email AS `email`,
  E.name AS `h_name`

FROM Clients AS C, Employees AS E
WHERE C.id = $clientId
AND C.emp_id = E.id";

$result = $conn->query($sql);

// Check if the query is successful
if ($result->num_rows > 0) {
  // Output data for each row in the result set
  while($row = $result->fetch_assoc()) {
    echo "Client ID: ".$row["id"]."<br>"; 
    echo "Name: ".$row["name"]."<br>"; 
    echo "Email: ".$row["email"]."<br>"; 
    echo "Handler: ".$row["h_name"]."<br>"; 
  }
} 
else {
  echo "0 results";
}

?>