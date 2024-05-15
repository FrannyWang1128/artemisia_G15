<?php

header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/voicexml+xml; charset=utf-8'); 

// parameters for database
$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";

// create link to database
$conn = new mysqli($servername, $username, $password, $dbname);

// check the link to database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check the process of form submit
if (isset($_POST['farmer_id'], $_POST['price'], $_POST['quantity'])) {
    $farmer_id = $_POST['farmer_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO price_list (farmer_id, storage, price) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $farmer_id, $quantity, $price);


    if ($stmt->execute()) {
        // return right  vxml response
        echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
    <menu>
    <property name="inputmodes" value="dtmf"/>
     <prompt>
        your quote has been saved successfully!
        <break time="500"/>
        To farmer page again, please press nine.
        <break time="1000"/>
        To end the call, please press the asterisk key.
     </prompt>
    <choice dtmf="9" next="http://webhosting.voxeo.net/209453/www/main.xml"/>
    <choice dtmf="*" event="exit"/>
    </menu>
</vxml>';
    } else {
        // return vxml response
        echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
  <form>
    <block>
      <prompt>Failed to submit your message. Please try again later.</prompt>
    </block>
  </form>
</vxml>';
    }

    $stmt->close();
    $conn->close();
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
?>
