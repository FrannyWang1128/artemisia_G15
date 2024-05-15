<?php
// 设置响应头部
header("Access-Control-Allow-Origin: *"); // 仅用于测试，生产环境中应更具体
header('Content-Type: application/voicexml+xml; charset=utf-8'); // 确保输出为 VoiceXML 格式

// 数据库连接参数
$servername = "localhost";
$username = "id22092515_zhang";
$password = "Jin5211314...";
$dbname = "id22092515_language";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['buyer_id'], $_POST['farmer_id'], $_POST['demand'])) {
    $buyer_id = $_POST['buyer_id'];
    $farmer_id = $_POST['farmer_id'];
    $demand = $_POST['demand'];
    $stmt = $conn->prepare("INSERT INTO buyer_message (buyer_id, farmer_id, demand) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $buyer_id, $farmer_id, $demand);


    if ($stmt->execute()) {
        echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
    <menu>
    <property name="inputmodes" value="dtmf"/>
     <prompt>
        your message has been saved successfully!
        <break time="500"/>
        To buyer page again, please press nine.
        <break time="1000"/>
        To end the call, please press the asterisk key.
     </prompt>
    <choice dtmf="9" next="http://webhosting.voxeo.net/209453/www/main.xml"/>
    <choice dtmf="*" event="exit"/>
    </menu>
</vxml>';
    } else {

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
