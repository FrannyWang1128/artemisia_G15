<?php

header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/voicexml+xml; charset=utf-8'); 


$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['farmer_id'])) {
    $farmer_id = $_POST['farmer_id'];

    $stmt = $conn->prepare("SELECT buyer_id, demand FROM buyer_message WHERE farmer_id = ?");
    $stmt->bind_param("i", $farmer_id);

    $stmt->execute();
    $result = $stmt->get_result();

    $response = '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
  <form>
    <block>
      <prompt>Messages for farmer ID ' . $farmer_id . ':</prompt>
    </block>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response .= '<block><prompt>Buyer ID: ' . $row['buyer_id'] . ', Demand: ' . $row['demand'] . '</prompt></block>';
        }
    } else {
        $response .= '<block><prompt>No messages found for farmer ID ' . $farmer_id . '</prompt></block>';
    }

    $response .= '</form>
</vxml>';

    echo $response;
} else {

    echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
  <form>
    <block>
      <prompt>Invalid request. Please try again.</prompt>
    </block>
  </form>
</vxml>';
}

$stmt->close();
$conn->close();
?>
