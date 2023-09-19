<?php
require_once '../Model/Model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        // Check if the key is for approval
        if (strpos($key, 'approval_') === 0) {
            // Extract the serial number from the key
            $serial_number = substr($key, 9);
            update_user_approval($serial_number, $value);
        }
    }
}

echo '<div style="text-align: center;">
<p style="font-size: 24px; font-weight: bold; color: green;">Users have been approved!</p>
</div>';

echo '<div style="text-align:center; margin-top: 20px;">
<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; margin-right: 10px;" onclick="goToPage(\'../View/TransportOwner_Registration_Requests.php\')">Back</button>

<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; margin-right: 20px;" onclick="goToPage(\'../View/WorkStartControlpanel.php\')">Home</button>
</div>';

echo '<script>
function goToPage(url) {
    window.location.href = url;
}
</script>';
?>
