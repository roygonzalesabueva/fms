<?php
session_start();
session_unset();
session_destroy();
header("Location: http://202.137.126.58/")
?>