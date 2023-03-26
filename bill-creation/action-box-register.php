<?php

include '../connect.php';

// Get the user input from the HTML form
$cid = $_POST["client-id"];
$bid = $_POST["box-id"];
$to_date = $_POST["date"];
$rent_dur = $_POST["month"];

$sql = "SELECT B.rent
        FROM Boxes AS B
        WHERE B.id = $bid";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$rent = $row['rent'];

$billing = $rent_dur * $rent;

// Prepare the SQL query using a parameterized statement
$stmt = $conn->prepare(
  "INSERT INTO `Transactions` (`id`, `client_id`, `box_id`, `registration_date`, `rent_duration`, `billing_amount`) 
  VALUES (NULL, ?, ?, ?, ?, ?)"
);

$stmt1 = $conn->prepare(
  "UPDATE `Boxes` SET `available` = '0' WHERE `Boxes`.`id` = $bid"
);

// Bind the user input to the parameters in the prepared statement
$stmt->bind_param("iisii", $cid, $bid, $to_date, $rent_dur, $billing);

// // Execute the prepared statement
if ($stmt->execute() === TRUE) {
  echo "New record created successfully.<br>";
}
else {
  echo "Error: " . $stmt->error;
}

if ($stmt1->execute() === TRUE) {
  echo "Box availability changed.<br>";
}
else {
  echo "Error: " . $stmt1->error;
}

// Close the prepared statement and database connection
$stmt->close();
$stmt1->close();
$conn->close();


?>