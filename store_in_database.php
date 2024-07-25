<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebWorksPro</title>
</head>
<body>
  

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
$servername = "localhost";
$username = "root";  // Default username for MySQL
$password = "";      // Default password is empty for MySQL in XAMPP/WAMP
$dbname = "billing";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $cardNumber = htmlspecialchars($_POST['cardNumber']);
    $cardHolder = htmlspecialchars($_POST['cardHolder']);
    $expiryDate = htmlspecialchars($_POST['expiryDate']);
    $cvv = htmlspecialchars($_POST['cvv']);
    
    // Basic validation
    if (empty($cardNumber) || empty($cardHolder) || empty($expiryDate) || empty($cvv)) {
        echo "All fields are required.";
        exit;
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO payments (cardNumber, cardHolder, expiryDate, cvv) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $cardNumber, $cardHolder, $expiryDate, $cvv);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment details stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close connection
    $stmt->close();
    $conn->close();
}
?>

</body>
</html>