<?php
header("Access-Control-Allow-Origin: *"); // 仅用于测试，生产环境中应更具体
header('Content-Type: application/json; charset=utf-8'); // 确保输出为JSON格式

$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT buyer_id, farmer_id, demand FROM buyer_message";
$result = $conn->query($sql);

$demands = [];
if ($result !== null && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $demands[] = $row;
    }
    echo json_encode($demands);
} else {
    echo json_encode(["error" => "No data found"]);
}

$conn->close();
?>
