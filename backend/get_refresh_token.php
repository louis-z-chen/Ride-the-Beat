<?php
require "../reusable_code/curr_user_info.php";

echo json_encode(
  array(
    'refresh' => $curr_refresh
  )
);
?>
