<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json; charset=utf-8'); 

$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";
$prices = []; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT farmer_id, storage, price FROM price_list";
$result = $conn->query($sql);

if ($result !== null && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $prices[] = array(
            "farmer_id" => $row["farmer_id"],
            "storage" => $row["storage"],
            "price" => $row["price"]
        );
    }
    echo json_encode($prices);
} else {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(["error" => "No data found"]);
}


$conn->close();
?>
