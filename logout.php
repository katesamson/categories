<?php
session_start();
session_destroy();
echo "<p>Successfully logged out</p>";
include "index.php";
?>