<?php
header('Content-Type: application/voicexml+xml');

if(isset($_FILES['user_recording']['tmp_name'])) {
    $audioData = file_get_contents($_FILES['user_recording']['tmp_name']);
    $savePath = '../../wav/recordings/';
    $saveFilename = 'recording_' . time() . '.wav';
    file_put_contents($savePath . $saveFilename, $audioData);
    echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
    <menu>
    <property name="inputmodes" value="dtmf"/>
     <prompt>
        your recoding has been saved successfully!
        <break time="500"/>
        To farmer page again, please press nine.
        <break time="1000"/>
        To end the call, please press the asterisk key.
     </prompt>
    <choice dtmf="9" next="http://webhosting.voxeo.net/209453/www/farmer_func.xml"/>
    <choice dtmf="*" event="exit"/>
    </menu>
</vxml>';
} else {
    echo '<?xml version="1.0" encoding="UTF-8"?>
<vxml version="2.1">
<prompt>
There is no recording yet. please try again then
</prompt>
</vxml>';
}
?>
