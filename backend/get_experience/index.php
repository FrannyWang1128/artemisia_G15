<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json; charset=utf-8'); 
$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";
$experience = []; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT farmer_id, experience FROM experience_share";
$result = $conn->query($sql);

if ($result !== null && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $experience[] = array(
            "farmer_id" => $row["farmer_id"],
            "experience" => $row["experience"],
        );
    }
    echo json_encode($experience);
} else {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(["error" => "No data found"]);
}

$conn->close();
?>
