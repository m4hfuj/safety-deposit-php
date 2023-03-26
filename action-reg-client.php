<?php

include 'connect.php';

// Get the user input from the HTML form
$id = $_POST["fname"];
$name  = $_POST["fname"];
$email = $_POST["email"];
$emp   = $_POST["emp"];

// Prepare the SQL query using a parameterized statement
$stmt = $conn->prepare(
  "INSERT INTO `Client` (`id`, `name`, `email`, `reg_date`, `emp_id`) VALUES (?, ?, ?, '2023-03-16', ?);"
);
// Bind the user input to the parameters in the prepared statement
$stmt->bind_param("issi", $id, $name, $email, $emp);

// // Execute the prepared statement
if ($stmt->execute() === TRUE) {
    echo "New record created successfully", index.html;
}
 else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();


?>
