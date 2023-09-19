<?php
require_once '../Model/Model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        // Check if the key is for approval
        if (strpos($key, 'approval_') === 0) {
          // Extract the serial number from the key
          $serial_number = substr($key, 9);
          update_terminal_approval($serial_number, $value);
        }
      }
}
echo '<div style="text-align: center;">
<p style="font-size: 24px; font-weight: bold; color: green;">Terminal have been approved!</p>
</div>';

?>