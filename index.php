<?php
$servername = "localhost";
$username = "suraj";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";




?>

<html>
<head>
  <title>Suraj's Shopping Cart</title>
</head>
<body>
  
  <div id="shopping-cart">
    <div class="header">
      Shopping Cart
    </div>
    
    
  </div>
</body>

</html>