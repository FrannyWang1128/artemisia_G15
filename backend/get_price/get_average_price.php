<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json; charset=utf-8');

$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";
$average_price = 0; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT price FROM price_list";
$result = $conn->query($sql);

if ($result !== null && $result->num_rows > 0) {
    $total_price = 0;
    $count = 0;
    while($row = $result->fetch_assoc()) {
        $total_price += $row["price"];
        $count++;
    }
    if ($count > 0) {
        $average_price = $total_price / $count;
    }
}
$average = ["average_price" => $average_price];
echo json_encode([$average]);

$conn->close();
?>
