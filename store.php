<html>
<head>
<title>Shopping Cart</title>
</head>
<body>
<h2>This is everything you bought with the stock</h2>
<?php
session_start();

$conn = mysqli_connect("localhost", "suraj", "", "miniproject");
if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}
echo "Database Conencted successfully <br/>";

$apple = $_POST["apple"];
$banana = $_POST["banana"];
$bread = $_POST["bread"];
$chips = $_POST["chips"];
$juice = $_POST["juice"];
$milk = $_POST["milk"];
$tomato = $_POST["tomato"];
$headphones = $_POST["headphones"];
$laptop = $_POST["laptop"];
$phone = $_POST["phone"];
$printer = $_POST["printer"];
$speakers = $_POST["speakers"];
$tv = $_POST["tv"];
$hoodie = $_POST["hoodie"];
$jacket = $_POST["jacket"];
$jeans = $_POST["jeans"];
$shirt = $_POST["shirt"];
$shoes = $_POST["shorts"];
$sunglasses = $_POST["sunglasses"]


echo 'Thanks for submitting the form.<br />';
echo 'Your name' . $first_name;
echo 'Last name' . $last_name;
echo 'You were abducted ' . $when_it_happened;
echo ' and were gone for ' . $how_long . '<br />';
echo 'Number of aliens: ' . $how_many . '<br  />';
echo 'Describe them: ' . $alien_description . '<br />';
$query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, how_many,
alien_description, what_they_did, fang_spotted, other, email) VALUES ('$first_name', '$last_name', '$when_it_happened',
'$how_long', '$how_many','$alien_description',
'$what_they_did', '$fang_spotted', '$other', '$email')";

$result = mysqli_query($conn, $query);
if ($result) {
        echo 'New record created successfully <br/>';
}
else {
        echo 'Error: ' . $query . '<br>' . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
