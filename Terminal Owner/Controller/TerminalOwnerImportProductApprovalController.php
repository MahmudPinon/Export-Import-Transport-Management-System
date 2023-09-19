<?php
require_once '../Model/Model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        // Check if the key is for approval
        if (strpos($key, 'approval_') === 0) {
          // Extract the serial number from the key
          $ProductId = substr($key, 9);
          update_importproduct_approval($ProductId, $value);
        }
    }
    // Echo the HTML code
    echo '<div style="text-align: center;">
              <p style="font-size: 24px; font-weight: bold; color: green;">Product have been approved!</p>
          </div>';
}
?>

