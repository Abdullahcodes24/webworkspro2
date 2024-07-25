<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebWorksPro</title>
</head>
<body>
  


<?php
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
    
    if (!preg_match('/^\d{16}$/', $cardNumber)) {
        echo "Invalid card number.";
        exit;
    }
    
    if (!preg_match('/^\d{2}\/\d{2}$/', $expiryDate)) {
        echo "Invalid expiry date format.";
        exit;
    }
    
    if (!preg_match('/^\d{3}$/', $cvv)) {
        echo "Invalid CVV.";
        exit;
    }
    
    // Here you would normally process the payment using a payment gateway API.
    
    echo "Payment details processed successfully.";
}
?>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
   

    // Process the data (e.g., save to database, send email, etc.)
    // For this example, we'll just display the submitted data

    echo "<h1>Billing Information Submitted</h1>";
    echo "<p><strong>First Name:</strong> $first_name</p>";
    echo "<p><strong>Last Name:</strong> $last_name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>State:</strong> $state</p>";
    echo "<p><strong>ZIP Code:</strong> $zip</p>";
   
} else {
    echo "Invalid request.";
}
?>

</body>
</html>